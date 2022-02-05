<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\Models\Client;
use App\Models\Guest;
use App\Models\Video;
use App\Models\View;
use App\MyHelper\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GuestController extends Controller
{

    public $helper ;
    public $model ;

    public function __construct()
    {
        $this->helper = new  Helper() ;
        $this->model = new  Guest() ;
    }



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


    public function loginGuest(Request $request)
    {

        $rules = [
            'email' => 'required|email'
        ];
        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $findGuset = $this->model->whereEmail($request->email)->first();
        if ($findGuset){

            $findGuset->pin_code = $this->getPinCode() ;
            $findGuset->pin_code_date_expired = $this->getPinCodeExpiredDate();
            $findGuset->save();
            $token = $findGuset->createToken('android')->accessToken;

            return $this->helper->responseJson(1,'dn',['token'=>$token , 'user' => $findGuset]);
            //TODO SEND PIN CODE EMAIL
         //   $this->sendPinCodeEmail($findGuset);
        }else{

            $createAccount = Guest::create([
                'email' => $request->email ,
                'pin_code' => $this->getPinCode() ,
                'pin_code_date_expired' =>$this->getPinCodeExpiredDate() ,
            ]);

            $token = $createAccount->createToken('android')->accessToken;
            return $this->helper->responseJson(1, 'تم تسجيل الدخول بنجاح', ['token' => $token, 'user' =>$createAccount]);

            //TODO SEND PIN CODE EMAIL ;
           // $this->sendPinCodeEmail($findGuset);
        }
    }


    public function sendPinCodeEmail($record){
        Mail::to($record->email)

            ->bcc("testpincode75@gmail.com")
            ->send(new ResetPassword($record->pin_code));
        return $this->helper->responseJson(1,'برجاء فحص البريد الالكتروني',
            [
                'pin_code'=>$record->pin_code,
            ]
        );

    }


    public function checkPinCode(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:guests,email' ,
            'pin_code' => 'required|exists:guests,pin_code'
        ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $findTalent = Guest::whereEmail($request->email)->first();

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
            return $this->helper->responseJson(0, " البريد الالكتروني غير مسجل لدينا في قواعد البيانات الخاصه بنا ");

        }
    }



    public function addView(Request $request)
    {
        $client = auth()->user() ;
        $rules =
            [
                'video_id' => 'required|exists:videos,id',
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

//        $client->views()->create($request->all());

        if (auth()->guard('guest'))
        {
            $findView = View::whereVideoId($request->video_id)->whereGuestId($client->id)->first();

            if ($findView == null){
                $client->views()->create($request->all());
                return  $this->helper->responseJson(1,'dn');
            }else{
                return  $this->helper->responseJson(0,'sorry');
            }
        }
    }




    public function addComment(Request $request)
    {

        $client = auth()->user() ;
        $rules =
            [
                'content' => 'required',
                'video_id' => 'required|exists:videos,id',
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $viedo = Video::findOrFail($request->video_id);
        $client_id = $viedo->client_id ;
        $findClinetUploadVideo = Client::findOrFail($client_id) ;
        $record = $client->comments()->create($request->all());

        Helper::sendNotification($findClinetUploadVideo,$client,[$findClinetUploadVideo->id],'clients',
            'comment',
            $client->full_name .'Commented On Your Video ');
        return $this->helper->responseJson(1,'dn');
    }


}
