@extends('layouts.app')
@section('styles')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>จัดการข้อมูล Menu </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"> ข้อมูลเมนูอาหาร</h3>
                            <form action="{{url('show/addmenu')}}" method="get">
                                <p align="right"><input type="submit" class="btn btn-info" value="เพิ่ม">
                            </form>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            {{--</form></td>--}}
                            {{--@if (session('alert'))--}}
                                {{--<div class="alert alert-success">--}}
                                    {{--{{ session('alert') }}--}}
                                {{--</div>--}}
                            {{--@endif--}}

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>

                                <tr>
                                    <th>ลำดับ</th>
                                    <th>รายการอาหาร</th>
                                    <th>ราคา</th>
                                    <th>ประเภทอาหาร</th>
                                    <th>วันที่เพิ่มข้อมูล</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $i = 1?>
                                @foreach($data as $list)
                                    <tr>

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <td>{{$i}} </td>
                                        <td>{{$list->menu}}  </td>
                                        <td>{{$list->price}}  </td>
                                        <td>{{$list['foodCategory'][0]['foodcategory_Name']}}  </td>
                                        <td>{{$list->created_at}}  </td>
                                        <td>
                                            <form action="{{url('/show/update/addmenu/'.$list->id)}}" method="get">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                                <input type="submit" class="btn btn-warning" value="แก้ไข"
                                                       onclick="return confirm_edit()">
                                            </form>
                                        </td>


                                        <td>
                                            <form action="{{url('menu/delete/'.$list->id)}}" method="get">
                                                <input type="submit" class="btn  btn-danger" value="ลบ">

                                            </form>
                                        </td>

                                    </tr>
                                    <?php $i++ ?>
                                @endforeach
                                </tbody>


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


