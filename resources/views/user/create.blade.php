@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    {!! Form::open(array('url' => 'adduser','files' => true)) !!}
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">ข้อมูลผู้ใช้</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->

                            <div class="box-body">
                                {{--validate  show error--}}
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
                                            <label for="exampleInputPassword1">Name</label>
                                            <input name="name" type="text" class="form-control"
                                                   value="{{ old( 'name') }}" id="exampleInputPassword1"
                                                   placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input name="email" type="email" class="form-control"
                                                   value="{{ old( 'email') }}" id="exampleInputEmail1"
                                                   placeholder="Enter email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Username</label>
                                            <input name="username" type="text" class="form-control"
                                                   value="{{ old( 'username') }}" id="exampleInputPassword1"
                                                   placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input name="password" type="password" class="form-control"
                                                   id="exampleInputPassword1" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password Confirm</label>
                                            <input name="password_confirmation" type="password" class="form-control"
                                                   id="exampleInputPassword1" placeholder="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{--ไฟล์รูป--}}
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input name="file_name" type="file" class="form-control" id="InputFile">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputPassword" >positions</label>
                                            <option value="">เลือกตำแหน่ง</option>
                                            <select name="user_positions_id" class="form-control">
                                                @foreach($data as $user_positions)
                                                    <option value="{{$user_positions->id}}">{{$user_positions->name}}</option>
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
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">การจัดการสิทธิ์ผู้ใช้ </h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">พนักงาน</label>
                                        <div class="checkbox">
                                            <label><input name="staff_all" type="checkbox" value="true">ทั้งหมด</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="staff_order" type="checkbox" value="true">สั่งอาหาร</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="staff_vieworder" type="checkbox" value="true">ดูรายการสั่งอาหาร</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="staff_updateorder" type="checkbox" value="true">แก้ไขรายการสั่งอาหาร</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="staff_deleteorder" type="checkbox" value="true">ยกเลิกรายการสั่งอาหาร</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">แคชเชียร์</label>
                                        <div class="checkbox">
                                            <label><input name="cashier_all" type="checkbox" value="true">ทั้งหมด</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="cashier_checkbill" type="checkbox" value="true">เช็คบิล</label>

                                            <div class="checkbox">
                                                <label><input name="cashier_viewbill" type="checkbox" value="true">ดูรายการบิล</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input name="cashier_report" type="checkbox" value="true">ออกรายงานการเงิน</label>
                                            </div>
                                            <div class="checkbox">
                                                <label><input name="cashier_deletereport" type="checkbox" value="true">ลบรายงานการเงิน</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ผู้จัดการ</label>
                                        <div class="checkbox">
                                            <label><input name="manage_all" type="checkbox" value="true">ทั้งหมด</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_viewmenu" type="checkbox" value="true">ดูเมนูอาหาร</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_addmenu" type="checkbox" value="true">เพิ่มเมนูอาหาร</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_updatemenu" type="checkbox" value="true">แก้ไขเมนูอาหาร</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_deletemenu" type="checkbox" value="true">ลบเมนูอาหาร</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_booktable" type="checkbox" value="true">จองโต๊ะ</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_viewbooktable" type="checkbox" value="true">ดูรายการจองโต๊ะ</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_updatebooktable" type="checkbox" value="true">แก้ไขการจองโต๊ะ</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input name="manage_deletebooktable" type="checkbox" value="true">ยกเลิกการจองโต๊ะ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ผู้ดูแลระบบ</label>
                                        <div class="checkbox">
                                            <label><input name="admin_user" type="checkbox" value="true">จัดการผู้ใช้งาน</label>
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