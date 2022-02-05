<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Video;
use App\MyHelper\Helper;
use Helper\Attachment;
use Illuminate\Http\Request;
use DB ;
class VideoController extends Controller
{
   public $model ;

   public $helper  ;

   public function __construct()
   {
       $this->model = new Video ;
       $this->helper = new  Helper;
   }

    public function store(Request $request)
    {

        $client = auth()->user() ;
        $rules =
            [
                'attachment' => 'required',
                'title' => 'required',
                'category_id' => 'required|exists:categories,id',
                'description' =>'required',
                'tags' => 'required'
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        DB::beginTransaction();
        try {

            $toJson = json_encode($request->tags,true);
            $json =  json_decode($toJson,true);
            $toConvert = ['tags' => $json];
            $request->merge($toConvert);
            $record = $client->videos()->create($request->except('attachments'));

            if ($request->attachment)
            {
                Attachment::addAttachment($request->file('attachment'), $record, 'talent/video', ['save' => 'original','usage'=>'video' ,'type' => 'video' ]);
            }
            DB::commit();
            return $this->helper->responseJson(1,'done',$record->load('attachmentRelation'));
        }catch (\Exception $e){
            DB::rollback();

            return  $this->helper->responseJson(0,'حدث خطآ ما');
        }
   }


    public function upVote(Request $request)
    {
        $client = auth()->user();
        $rules =
            [
                'id' => 'required|exists:videos,id',
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }
        $viedo = Video::findOrFail($request->id);

        $client_id = $viedo->client_id ;
        $findClinetUploadVideo = Client::findOrFail($client_id) ;


        $vote  =  $client->upVote($viedo);


        Helper::sendNotification($findClinetUploadVideo,$client,[$findClinetUploadVideo->id],' voted',
            'voted',
            $client->full_name .' Voted For You');

        return $this->helper->responseJson(1, 'Vote DONE ');

    }
}
