<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Video;
use App\MyHelper\Helper;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('front.home');
    }

    public function about()
    {
        return view('front.about');
    }

    public function roles()
    {
        return view('front.roles');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function login()
    {
        return view('front.login');
    }

    public function profile()
    {
        return view('front.profile');
    }

    public function allsports(Request $request)
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
        })->with('attachmentRelation')->latest()->paginate(9);


        if ($request->ajax()) {
            $view = view('front.data',compact('videos'))->render();
            return response()->json(['video'=>$view]);
        }
        return view('front.allsports',compact('videos'));
    }

    public function videoById($id)
    {
        $video = Video::with('attachmentRelation')->findOrFail($id);

        $videos = Video::with('attachmentRelation')->latest()->paginate(6);
        return view('front.videoById',compact('video','videos'));
    }




}
