<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Video;
use App\Models\View;
use Illuminate\Http\Request;
use App\MyHelper\Helper;
class ViewController extends Controller
{
    //

    public function __construct()
    {
        $this->helper = new Helper();

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

        if (auth()->guard('clients'))
        {
            $findView = View::whereVideoId($request->video_id)->whereClientId($client->id)->first();

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
