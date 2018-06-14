@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    {!! Form::open(array('url' => 'addmenu','files' => true)) !!}
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">ข้อมูลรายการอาหาร</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->

                            <div class="box-body">
                                {{--validate  show error--}}
                                {{--@if ($errors->any())--}}
                                    {{--<div class="alert alert-danger">--}}
                                        {{--<ul>--}}
                                            {{--@foreach ($errors->all() as $error)--}}
                                                {{--<li>{{ $error }}</li>--}}
                                            {{--@endforeach--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--@endif--}}
                                {{--validate error--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputMenu">รายการอาหาร</label>
                                            <input name="menu" type="text" class="form-control"
                                                   value="{{ old( 'menu') }}" id="exampleInputMenu"
                                                   placeholder="กรอกรายการอาหาร">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPrice">ราคา</label>
                                            <input name="price" type="double" class="form-control"
                                                   value="{{ old( 'price') }}" id="exampleInputPrice"
                                                   placeholder="กรอกราคาอาหาร">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputFoodcategory" >ประเภทอาหาร</label>
                                            <option value="">เลือกประเภทอาหาร</option>
                                            <select name="foodcategoryid" class="form-control">
                                                @foreach($foodCategory as $NewfoodCategory)
                                                    <option value="{{$NewfoodCategory->foodcategoryid}}">{{$NewfoodCategory->foodcategory_Name}}</option>
                                                    {{--<option value="{{ค่าที่เก็บลงฐาน}}"> แสดงชื่อ</option>--}}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <center>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
        </center>

    </div>
    {!! Form::close() !!}
@endsection
@push('scripts')

@endpush