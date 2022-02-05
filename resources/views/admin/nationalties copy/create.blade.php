@extends('admin.layouts.main',[
                                'page_header'       => 'المدن',
                                'page_description'  => '  اضافة  ',
                                'link' => url('admin/countries')
                                ])
@section('content')

    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::model($model,[
                                'action'=>'Admin\CountryController@store',
                                'id'=>'myForm',
                                'role'=>'form',
                                'method'=>'POST',
                                'files' => true
                                ])!!}
        <div class="box-body">

            @include('admin.countries.form')

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">حفظ</button>
            </div>

        </div>
        {!! Form::close()!!}

    </div>

@endsection
