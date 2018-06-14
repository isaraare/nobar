@extends('layouts.app')
@section('styles')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1> </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">แก้ไขข้อมูลรายการอาหาร</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            {!! Form::open(array('url' => 'menu/update/'.$data['id'],'files' => true)) !!}

                            {{--<form action="{{url('update/user/'.$data['id'])}}" method="post">--}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box-body">


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputName">รายการอาหาร</label>
                                            <input type="text" name="menu" value="{{$data['menu']}}"  class="form-control" placeholder="รายการอาหาร" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ราคา</label>
                                            <input type="text" name="price" value="{{$data['price']}}"  class="form-control" placeholder="รายการอาหาร" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputPassword" >ประเภทอาหาร</label>
                                            <select name="foodcategoryid" class="form-control">
                                                {{--{{$data['foodcategoryid']}}--}}
                                                @foreach($category as $NewfoodCategory)
                                                    {{--<optยยion value="{{$NewfoodCategory->foodcategoryid}}">{{$NewfoodCategory->foodcategory_Name}}</option>--}}
                                                    {{--แบบแก้ไข--}}
                                                    {{--<option value="{{$NewfoodCategory->foodcategoryid}}"></option>--}}
                                                    <option <?php if ($data['foodcategoryid'] == $NewfoodCategory->foodcategoryid ) echo 'selected' ; ?> value="{{$NewfoodCategory->foodcategoryid}}">{{$NewfoodCategory->foodcategory_Name}}</option>
                                                    {{--<option value="{{ค่าที่เก็บลงฐาน}}"> แสดงชื่อ</option>--}}
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{--<div class="col-md-6">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label for="inputPassword" >positions</label>--}}
                                    {{--<select name="user_positions_id" class="form-control">--}}
                                    {{--{{$data['foodcategoryid']}}--}}
                                    {{--@foreach($data as $user_positions)--}}
                                    {{--<option value="{{$user_positions->id}}">{{$user_positions->name}}</option>--}}
                                    {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}



                                </div>

                                <!-- /.box-body -->
                                <center>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">แก้ไข</button>
                                </div></center>
                                {!! Form::close() !!}
                                {{--</form>--}}

                            </div>
                            <!-- /.box -->


                            <!-- /.box -->



                        </div>

                    </div>
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
