<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\Client as ResourceClient;
use App\Http\Resources\ClientProfile;
use App\Http\Resources\PersonalInformation;
use App\Mail\ActiveAccount;
use App\Mail\ResetPassword;
use App\Models\Client;
use App\MyHelper\Helper;
use Carbon\Carbon;
use Helper\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\Passport;

class AuthController extends ParentApi
{


    public function getPinCode(): int
    {
        //TODO rand when confirm rand(1000 , 9999)
//        return rand(111111,999999);

        return  111111;
    }

    public function getPinCodeExpiredDate(): string
    {
        return Carbon::now()->addMinutes(1);
    }



    public function __construct()
    {

        $this->helper = new Helper();
        $this->guard = 'api';
        $this->model = new Client();
        $this->table = 'clients';
        $this->uniqueRow = 'phone';
        $this->sendPinCodeErrorMessage = 'رقم الهاتف غير صحيح';
    }

    //
    public function  register(Request $request){

        $rules =
            [
            'phone' => 'required|unique:clients,phone',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required',
            'relative_phone' => 'required',
            'd_o_b' =>'required|date|after_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
             'is_check' => 'required|in:1'
            ];


        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $request->merge(['password'=>bcrypt($request->password)]);
        $record = $this->model->create($request->all());

        /// to save and send pin code
        $record->pin_code = $this->getPinCode() ;
        $record->pin_code_date_expired = $this->getPinCodeExpiredDate();
        $record->save();
        //TODO SMS API
        $token = $record->createToken('android')->accessToken;
        return $this->helper->responseJson(1, 'تم الاضافه بنجاح',['token' => $token, 'user' =>  $record]);
    }


    public function checkPinCode(Request $request)
    {
        $rules = [
            'phone' => 'required|exists:clients,phone' ,
            'pin_code' => 'required|exists:clients,pin_code'
        ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $findTalent = Client::wherePhone($request->phone)->first();

        if ($findTalent)
        {

          $dateExpire =   $findTalent->pin_code_date_expired ;

          $findCode = $findTalent->pin_code ;
          if ($findCode == $request->pin_code) {

              if ($dateExpire < Carbon::now())
              {
                  return $this->helper->responseJson(0, 'كود التاكيد غير صالح');

              }
              return $this->helper->responseJson(1,'كود التاكيد صالح');
          }else{
              return  $this->helper->responseJson(0,'كود التحقيق خطآ يرجي التاكد او المحاوله مره اخري ');
          }

        }else{
            return $this->helper->responseJson(0, " رقم الهاتف غير مسجل لدينا في قواعد البيانات الخاصه بنا ");

        }
    }


    public function registerStepTwo(Request $request)
    {
        $rules =
            [
                'phone' => 'required|exists:clients,phone' ,
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required|in:male,female',
                'nationalty_id' => 'required|exists:nationalties,id',
                'country_id' => 'required|exists:countries,id',
                'type_identifier' => 'required|in:identifier,passport',
                'expiration_date' => 'required|date_format:Y-m-d',
                'number_identifier' => "required" ,
                'bio' => 'nullable',
                'profileImage' => 'nullable'
            ];


        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }


        $findTalent = Client::wherePhone($request->phone)->first();

        if ($findTalent){

            $findTalent->first_name = $request->first_name ;
            $findTalent->last_name = $request->last_name ;
            $findTalent->gender = $request->gender ;
            $findTalent->nationalty_id = $request->nationalty_id ;
            $findTalent->country_id = $request->country_id ;
            $findTalent->type_identifier = $request->type_identifier ;
            $findTalent->expiration_date = $request->expiration_date ;
            $findTalent->type_identifier = $request->type_identifier ;
            $findTalent->number_identifier = $request->number_identifier;
            $findTalent->bio = $request->bio ?? null ;
            $findTalent->push();
            if ($request->profileImage)
            {
                Attachment::addAttachment($request->file('profileImage'), $findTalent, 'talent/profileImage', ['save' => 'original','usage'=>'profile-image']);

            }

            $token = $findTalent->createToken('android')->accessToken;
            return $this->helper->responseJson(1,'تم التسجيل بنجاح',['token' => $token,'user'=>$findTalent]);
        }else{
            return  $this->helper->responseJson(0,'عفوا الرقم غير مسجل لدينا');
        }
    }
    public function login(Request $request)
    {
        $rules =
            [
                'phone' => 'required|exists:clients,phone',
                'password' => 'required',
                'token' => 'required',
                'serial_number' => 'required',
                'os' => 'required|in:android,ios',
            ];


        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $user = $this->model->where(['phone' => $request->phone])->first();
        //check if user exists
        if ($user) {

//            if ($user->is_active == 0)
//            {
//                return $this->helper->responseJson(0, 'يجب تاكيد الحساب عن طريق الايميل ');
//
//            }
            if (Hash::check($request->password , $user->password))
            {
                $token = $user->createToken('android')->accessToken;
                if ($user->tokens()->where('serial_number', $request->serial_number)->first()) {
                    $phone_token = $user->tokens()->where('serial_number', $request->serial_number)->first();
                    $phone_token->update([

                        'token' => $request->token,
                        'type' => $request->os,
                        'serial_number' => $request->serial_number
                    ]);

                } else {

                    $user->tokens()->create(['token' => $request->token, 'type' => $request->os, 'serial_number' => $request->serial_number]);
                }

                return $this->helper->responseJson(1, 'تم تسجيل الدخول بنجاح', ['token' => $token, 'user' =>$user]);

            } else {

                return $this->helper->responseJson(0, 'كلمة المرور غير صحيحة');
            }


        }
        else
        {
            return $this->helper->responseJson(0, 'رقم الهاتف غير صحيح');

        }

        // send pin code to confirm phone
    }


    public function updateProfile(Request $request)
    {

        $client = $request->user('clients');

        $rules =
            [

                'first_name' => 'nullable',
                'last_name' => 'nullable',
                'phone' => 'nullable',
                'email' => 'nullable',
                'bio' => 'nullable',
                'country_id' => 'nullable|exists:countries,id' ,
                'd_o_b' =>'nullable|date|after_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
                'profile_image' => 'nullable',
                'cover' => 'nullable',

        ];

        $validator = validator()->make($request->all(), $rules);


        if ($validator->fails()) {

            return $this->helper->responseJson(0, $validator->errors()->first());
        }
            $client->update($request->all());
        if ($request->profile_image)
        {
           $profileImage =  $client->attachmentRelation->where('usage','profile-image')->first() ;


           if ($profileImage != null){
               Attachment::updateAttachment($request->file('profile_image'),$profileImage, $client, 'talent/profileImage', ['save' => 'original','usage'=>'profile-image']);

           }else{

               Attachment::addAttachment($request->file('profile_image'), $client, 'talent/profileImage', ['save' => 'original','usage'=>'profile-image']);

           }
        }



        if ($request->cover)
        {
            $profile =  $client->attachmentRelation->where('usage','cover')->first() ;

            if ($profile != null ){
                Attachment::updateAttachment($request->file('cover'),$profile, $client, 'talent/cover', ['save' => 'original','usage'=>'cover']);

            }else{
                Attachment::addAttachment($request->file('cover'), $client, 'talent/cover', ['save' => 'original','usage'=>'cover']);

            }
        }
        return $this->helper->responseJson(1,'dn',new PersonalInformation($client));

    }


    public  function  newPassword(Request $request){
        $validator = validator()->make($request->all(),[
           'pin_code' => 'required' ,
           'phone' => 'required' ,
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()){
            return $this->helper->responseJson(0,$validator->errors()->first());
        }
        $user = Client::where('pin_code',$request->pin_code)->where('phone',$request->phone)->first();

            if ($user)
            {
                $user->password = bcrypt($request->password);
                $user->pin_code = null ;
                if ($user->save()){
                    return $this->helper->responseJson(1,'تم تغير كلمه المرور بنجاح');
                }else{
                    return $this->helper->responseJson(0,'حدث خطأ ما يرجي المحاوله مره اخري');
                }
            }else{
                return $this->helper->responseJson(0,'تم استخدام الرمز من قبل يرجي المحاوله مره اخري');

            }
}




    public function changePassword(Request $request)
    {

        $client = $request->user('clients');

        $rules =
            [

                'oldpassword' => 'sometimes',
                'newpassword' => 'sometimes|confirmed',

            ];

        $validator = validator()->make($request->all(), $rules);


        if ($validator->fails()) {

            return $this->helper->responseJson(0, $validator->errors()->first());
        }

        $hashedPassword = $client->password;

        if ($request->oldpassword && $request->newpassword) {


            if (Hash::check($request->oldpassword, $hashedPassword))
            {

                if (!Hash::check($request->newpassword, $hashedPassword)) {


                    $client->password = bcrypt($request->newpassword);
                    $client->update(array(
                        'password' => $client->password,

                    ));

                    return $this->helper->responseJson(0, 'تم تحديث البيانات بنجاح', $client);

                }
                else {
                    return $this->helper->responseJson(0, 'new password can not be the old password!');
                }

            }
            else {

                return $this->helper->responseJson(0, 'old password doesnt matched ');
            }
        }
    }





    public function resetpassword(Request $request){

        $user = Client::where('phone',$request->phone)->first();

        if ($user) {
            $code = $this->getPinCode();
            $user->pin_code = $code ;
            $user->pin_code_date_expired = $this->getPinCodeExpiredDate();
            $user->save();


//            if ($user->pin_code_date_expired > Carbon::now())
//            {
//                return $this->helper->responseJson(0, 'عفوا حدث خطأ يرجي الانتظار دقيقه من فضلك ');
//
//            }
            if ($user)
            {
                # send sms

//                Mail::to($user->email)
//
//                    ->bcc("support@teamat.online")
//                    ->send(new ResetPassword($code));
                         return $this->helper->responseJson(1,'برجاء فحص الهاتف ',
                    [
                        'pin_code'=>$code,
                        // 'mail_fails' => Mail::failures(),
                    ]
                );

            }
            else
            {
                return $this->helper->responseJson(0,'حدث خطآ ما يرجي المحاوله لاحقا');
            }
        }else
        {
            return $this->helper->responseJson(0,'عفوا  رقم الهاتف غير مسجل لنا');

        }

    }


    public function getProfile()
    {
        $client = auth()->user() ;
        return new ClientProfile($client);
    }


    public function personalInformation()
    {
        $client = auth()->user();


        return new PersonalInformation($client);
    }




    }
