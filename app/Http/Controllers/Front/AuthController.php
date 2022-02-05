<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\MyHelper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public $model  ;

    public function __construct()
    {
        $this->helper = new Helper() ;
        $this->model = new Client() ;
    }

    public function login(Request $request)
    {
        $rules = [
            'phone' => 'required|exists:clients,phone',
            'password' => 'required'
        ];


        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());

        }

        $user_data = array(
            'phone'  => $request->get('phone'),
            'password' => $request->get('password')
        );


        if(Auth::guard('client-web')->attempt($user_data))
        {


            return redirect('index');
        }
        else
        {

            return back()->withInput()->withErrors(['password' => 'بيانات الدخول غير صحيحة']);
        }


    }


    public function logout () {
        //logout user
        auth()->logout();
        // redirect to homepage
        return redirect('/');
    }
    //
}
