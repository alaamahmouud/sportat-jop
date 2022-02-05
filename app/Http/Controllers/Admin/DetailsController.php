<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Governorate;
use App\Models\Log;
use App\Models\Service;
use App\MyHelper\Helper;
use Helper\Attachment;
use Illuminate\Http\Request;
use Response;

class DetailsController extends Controller
{
    protected $model ;
    protected $viewsDomain = 'admin/details.';
    protected $url = 'admin/details';
    public function __construct()
    {
        $this->model = new Detail();
    }
    public function view($view, $params = [])
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

        //
        $records = $this->model->where(function ($q) use ($request)
        {
            if ($request->id)
            {
                $q->where('id',$request->id);
            }
            if ($request->name) {
                $q->where(function ($q) use ($request) {

                    $q->where('name', 'LIKE', '%' . $request->name . '%');
                });

            }

        })->latest()->paginate(6);
        return $this->view('index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $model = $this->model;
        return $this->view('create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules =
            [
                'name' => 'required',
                'service_id' => 'required|exists:services,id',
                'attachments' => 'required'
            ];

        $error_sms =
            [
                'name.required' => 'الرجاء ادخال الاسم ',
            ];

        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        $record = $this->model->create($request->all());
        Attachment::addAttachment($request->file('attachments'), $record, 'details/details', ['save' => 'original']);

        session()->flash('success', 'تمت الاضافة بنجاح');
        return redirect($this->url);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $model = $this->model->findOrFail($id);
        return $this->view('edit', compact('model'));
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
        //
        $record = $this->model->findOrFail($id);

        $rules =
            [
                'name' => 'required',
                'service_id' => 'required|exists:services,id',
                'attachments' => 'nullable'
            ];

        $error_sms =
            [
                'name.required' => 'الرجاء ادخال الاسم ',
            ];



        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }


        $record->update($request->all());
        $oldFile = $record->attachmentRelation[0] ?? null;

        if (!$oldFile)
        {
            Attachment::addAttachment($request->file('attachments'), $record, 'details/details', ['save' => 'original']);

        }else {
            Attachment::updateAttachment($request->file('attachments'), $oldFile, $record, 'details/details', ['save' => 'original']);
        }
        session()->flash('success', 'تمت تحديث بنجاح');
        return redirect($this->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $record = $this->model->findOrFail($id);


        $record->delete();

        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id
        ];
        return Response::json($data, 200);
    }





}
