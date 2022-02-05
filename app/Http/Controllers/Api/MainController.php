<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Http\Resources\SingleVideo;
use App\Http\Resources\VideoResource;
use App\Models\Category;
use App\Models\Client;
use App\Models\Country;

use App\Models\Nationalty;

use App\Models\Setting;
use App\Models\Video;
use App\MyHelper\Helper;
use DB;
use Helper\Attachment;
use Illuminate\Http\Request;
class MainController extends ParentApi
{

    public function __construct()
    {
        $this->helper = new Helper();

    }

    public function nationality()
    {
        $record = Nationalty::latest()->get();
        return $this->helper->responseJson(1,'List nationality' , $record);
    }

    public function countries(Request $request)
    {
        $record = Country::where(function ($q) use ($request){
            if ($request->search){
                $q->where('name','LIKE','%'.$request->search.'%');
            }
        })->latest()->get();
        return $this->helper->responseJson(1,'List Countries' , $record);
    }


    public function CompetitionRules()
    {
        $record = Setting::where('key','competition_rules')->select('value')->first();
        return $this->helper->responseJson(1,'List competition_rules' , $record);

    }
    public function categories(Request $request)
    {
        $categories = Category::select('id','name')->active()->simplePaginate(4);
        return $this->helper->responseJson(1,'List categories' , $categories);

    }


    public function index(Request $request)
    {
        $videos = Video::where(function ($query) use ($request){
            if ($request->category_id)

            {
                $query->where('category_id',$request->category_id);
            }

            if ($request->search)
            {
                $query->where('title','LIKE','%'.$request->search.'%');
            }
        })->with('attachmentRelation')->latest()->paginate(4);


        return (VideoResource::collection($videos))->additional([
            'status' => 1,
            'massage' => 'تمت العملية',
        ]);

    }

    //to upload new vedio..

    public function addvedio(Request $request)
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


    public function videoById(Request $request)
    {
        $rules =
            [
                'id' => 'required|exists:videos,id',
            ];

        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {

            return $this->helper->responseJson(0, $data->errors()->first());
        }

        $record = Video::findOrFail($request->id);

        return  new SingleVideo($record);
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




    public function downVote(Request $request)
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

        Helper::sendNotification($findClinetUploadVideo,$client,[$findClinetUploadVideo->id],'clients',
            'unvoted',
            $client->full_name .' UnVoted For You');

        $client->downVote($viedo);
        return $this->helper->responseJson(1, 'UNVote DONE ');

    }
/////////////////////////////////////////////




}
