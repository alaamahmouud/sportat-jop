<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Log;
use App\Models\Product;
use App\MyHelper\Helper;
use Helper\Attachment;
use Illuminate\Http\Request;
use Response;

class ProductController extends Controller
{
    protected $model ;
    protected $viewsDomain = 'admin/products.';
    protected $url = 'admin/products';
    public function __construct()
    {
        $this->model = new Product();
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
                'company_name' => 'required' ,
                'category_id' => 'required|exists:categories,id' ,
                'type_id' => 'required|exists:type,id',
                'quantity' => 'required' ,
                'price_before_discount' => 'required',
                'discount_value' => 'nullable',
//                'price_after_discount' => 'required',
                'attachments' => 'required',
                'description' => 'required'

            ];

        $error_sms =
            [
                'name.required' => 'الرجاء ادخال الاسم ',
                'company_name.required' => 'الرجاء ادخال اسم الشركه ',
                'category_id.required' => 'الرجاء ادخال القسم ',
                'type_id.required' => 'الرجاء ادخال نوع المنتج ',
                'quantity.required' => 'الرجاء ادخال الكميه ',
                'price_before_discount.required' => 'الرجاء ادخال قبل الخصم  ',
//                'price_after_discount.required' => 'الرجاء ادخال الاسم ',
            ];

        $data = validator()->make($request->all(), $rules, $error_sms);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        $code = $request->name .'-'. rand(1111,9999);
        $request->merge(['code'=>$code]);

        $record = $this->model->create($request->all());

        if (!empty($request->attachments) && count($request->attachments)) {
            $count = 0;
            foreach ($request->attachments as $attachment) {
                Attachment::addAttachment($request->file('attachments')[$count], $record, 'product/products', ['save' => 'original']);
                $count++;
            }
        }


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
        //
        $rules =
            [
                'name' => 'nullable',
                'company_name' => 'nullable' ,
                'category_id' => 'required|exists:categories,id' ,
                'type_id' => 'required|exists:type,id',
                'quantity' => 'nullable' ,
                'price_before_discount' => 'nullable',
                'discount_value' => 'nullable',
//                'price_after_discount' => 'required',
                  'attachments' => 'nullable',
                 'description' => 'nullable'

        ];

//        $error_sms =
//            [
//                'name.required' => 'الرجاء ادخال الاسم ',
//                'company_name.required' => 'الرجاء ادخال اسم الشركه ',
//                'category_id.required' => 'الرجاء ادخال القسم ',
//                'type_id.required' => 'الرجاء ادخال نوع المنتج ',
//                'quantity.required' => 'الرجاء ادخال الكميه ',
//                'price_before_discount.required' => 'الرجاء ادخال قبل الخصم  ',
////                'price_after_discount.required' => 'الرجاء ادخال الاسم ',
//        ];




        $data = validator()->make($request->all(), $rules);

        if ($data->fails()) {
            return back()->withInput()->withErrors($data->errors());
        }

        $record = $this->model->findOrFail($id);

        $record->update($request->all());

        if (!empty($request->attachments) && count($request->attachments)) {
            $count = 0;
            foreach ($request->attachments as $attachment) {
                Attachment::addAttachment($request->file('attachments')[$count], $record, 'product/products', ['save' => 'original']);
                $count++;
            }
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

            if ($record->products()->count())
            {
                return response()->json([
                    'status'  => 0,
                    'message' => __('لا يمكن الحذف يوجد منتجات مرتبطه')
                ]);

            }
        $record->delete();

        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id
        ];
        return Response::json($data, 200);
    }
    public function toggleBoolean($id, $action)
    {
        $record = $this->model->findOrFail($id);
        Helper::toggleBoolean($record);

        return Helper::responseJson(1, 'تمت العملية بنجاح');
    }




}
