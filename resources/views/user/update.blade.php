@extends('layouts.app')
@section('styles')
@endsection
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
                                <h3 class="box-title">แก้ไขข้อมูลผู้ใช้</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            {!! Form::open(array('url' => 'user/update/'.$data['id'],'files' => true)) !!}

                            {{--<form action="{{url('update/user/'.$data['id'])}}" method="post">--}}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="box-body">


                                {{-- validate  show error--}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{--validate error--}}
                             <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        {{--<input type="text" name="menu" value="{{$data['menu']}}"  class="form-control" placeholder="รายการอาหาร" required>--}}
                                        <input name="name" type="text" value="{{ old('name',$data['name'])}}" class="form-control" placeholder="Name">
                                    </div>
                                 </div>

                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Email address</label>
                                         <input name="email" type="email" value="{{ old( 'email', $data['email']) }}" class="form-control" placeholder="Enter email">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="exampleInputEmail1">Email address</label>
                                         <input name="email" type="email" value="{{ old( 'email', $data['email']) }}" class="form-control" placeholder="Enter email">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="exampleInputUsername">Username</label>
                                         <input name="username" type="text" value="{{ old( 'username', $data['username']) }}" class="form-control"  placeholder="Username">
                                     </div>
                                 </div>
                                 <div class="col-md-6">
                                     <div class="form-group">
                                         <label for="inputPassword" >positions</label>
                                         <option value="">เลือกตำแหน่ง</option>
                                         <select name="user_positions_id" class="form-control">
                                             @foreach($position as $user_positions)

                                                 <option <?php if ($data->user_positions_id == $user_positions->id ) echo 'selected' ; ?> value="{{$user_positions->id}}">{{$user_positions->name}}</option>


                                             @endforeach
                                         </select>
                                     </div>
                                 </div>
                                 {{--<div class="col-md-6">--}}
                                     {{--ไฟล์รูป--}}
                                     {{--<div class="form-group">--}}
                                         {{--<label for="exampleInputFile">File input</label>--}}
                                         {{--<input name="file_name" type="file" value="{{$data['file_name']}}" id="InputFile">--}}
                                     {{--</div>--}}
                                 {{--</div>--}}





                            </div>

                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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
