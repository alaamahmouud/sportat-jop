<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Video;
use App\Models\Contact;
use App\Models\Email;
use App\Models\Log;
use App\Models\Notification;
use App\Models\Setting;
use App\MyHelper\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;

class ClientController extends Controller
{
    protected $model;
    protected $helper;
    protected $viewsDomain = 'admin/clients.';

    public function __construct()
    {
        $this->model = new Client();
        $this->helper = new Helper();

    }


    private function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $records = $this->model->where(function ($q) use ($request)
        {
            if ($request->id)
            {
                $q->where('id',$request->id);
            }


        })->latest()->paginate(20);

        return $this->view('index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $model = $this->model ;
        $edit = false ;
        return  $this->view('create',compact('model','edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
             //
             $record = Client::findOrFail($id);
             $fullname = $record->FullName;
             $videos = Video::where('client_id',$id)->with("attachmentRelation")->get();

             return $this->view('show' , compact('record' ,'fullname' ,'videos')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
    }

    public function toggleBoolean($id, $action)
    {
        $record = $this->model->findOrFail($id);
        Helper::toggleBoolean($record);
        if ($record->is_active == 1)
        {
            Log::createLog($record , auth()->user() ,'عملية تفعيل' ,'تفعيل  عميل #' . $record->id);
        }else{
            Log::createLog($record , auth()->user() ,'عملية الغاء تفعيل ' ,'الغاء تفعيل  عميل #' . $record->id);
        }
        return Helper::responseJson(1, 'تمت العملية بنجاح');
    }

    public function active($id)
    {
        $record = $this->model->findOrFail($id);

        if ($record->is_active == 0)
        {
            $record->is_active = 1 ;
            $record->save() ;

            Log::createLog($record , auth()->user() ,'عملية تفعيل' ,'تفعيل  عميل #' . $record->id);
            flash()->success('تم التفعيل بنجاح');
            return back() ;
        }
    }
    public function deactivate($id)
    {
        $record = $this->model->findOrFail($id);

        if ($record->is_active ==1)
        {
            $record->is_active =0 ;
            $record->save() ;
            Log::createLog($record , auth()->user() ,'عملية الغاء تفعيل ' ,'الغاء تفعيل  عميل #' . $record->id);
            flash()->success('تم الغاء التفعيل بنجاح');
            return back() ;
        }
    }

}
