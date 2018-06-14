@extends('layouts.app')
@section('styles')
    {{ Html::style('css/AdminLTE.css') }}
@endsection
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>จัดการข้อมูล User </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> ข้อมูล User</h3>
                            <form action="{{url('show/add')}}" method="get">
                                <p align="right"><input type="submit" class="btn btn-info" value="เพิ่ม">
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{--</form></td>--}}
                            @if (session('alert'))
                                <div class="alert alert-success">
                                    {{ session('alert') }}
                                </div>
                            @endif
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>

                                <tr>
                                    <th>ลำดับ</th>
                                    <th>name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>ตำแหน่ง</th>
                                    <th>รูป</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>    {{--วนข้อมูลadduser--}}
                                @foreach($User as $list)   {{-- ค่าที่returnจากindex--}}


                                <tr>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <td>{{$i}} </td>
                                    <td>{{$list->name}}  </td>
                                    <td>{{$list->email}}  </td>
                                    <td>{{$list->username}}  </td>
                                    <td>{{$list['position']['name']}}</td>
                                    <td>
                                        <a href="{{url('pre-user/'.$list->file_path)}}" target="_blank">ดูรูป</a>
                                    </td>
                                    {{--<td><img src="{{url('app/pre-user/'.$list->file_path) }}"> </td>--}}
                                    {{--<td><img src="{{ storage_path().'app/pre-user/'.$list->image }}" alt="" title=""></td>--}}


                                    <td>
                                        <form action="{{url('showupdateuser/'.$list->id)}}" method="get">
                                            <input type="submit" class="btn btn-warning" value="แก้ไข">
                                        </form>
                                    </td>

                                    {{--<form action="{{url('delete/addmenu/'.$list->id)}}" method="get"> --}}
                                    {{--<input type="submit" class="btn  btn-danger" value="ลบ">--}}

                                    <td>
                                        <form action="{{url('user/delete/'.$list->id)}}" method="get">
                                            <input type="submit" class="btn  btn-danger" value="ลบ">
                                        </form>
                                    </td>
                                </tr>


                                </tbody>
                                <?php $i++ ?>
                                @endforeach
                                {{-- <tfoot>
                                <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
                                </tr>
                                </tfoot> --}}
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@push('scripts')
    {{ Html::script('plugin/jquery-slimscroll/jquery.slimscroll.min.js') }}

    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>


@endpush