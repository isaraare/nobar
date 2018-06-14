@extends('layouts.app')
@section('styles')

@section('content')

    <div class="content-wrapper" style="min-height: 960px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                สั่งรายการอาหาร
                {{--<small>advanced tables</small>--}}
            </h1>
            {{--<ol class="breadcrumb">--}}
                {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
                {{--<li><a href="#">Tables</a></li>--}}
                {{--<li class="active">Data tables</li>--}}
            {{--</ol>--}}
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            {{--<h3 class="box-title">สั่งรายการอาหาร</h3>--}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-hover dataTable" role="grid"
                                               aria-describedby="example2_info">
                                            <thead>
                                            <th>ลำดับ</th>
                                            <th>รายการอาหาร</th>
                                            <th>ราคา</th>
                                            <th>จำนวน</th>
                                            <th>สั่งอาหาร</th>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1?>
                                            @foreach($data as $list)
                                            <tr>
                                                <form action="{{url('add/order')}}" method="post">
                                                    <input value="{{$list->id}}" type="hidden" name="id_menus">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <td>{{$i}} </td>
                                                    <td>{{$list->menu}}  </td>
                                                    <td>{{$list->price}}  </td>
                                                    <td><input value="" type="number" class="form-control" name="amount"></td>

                                                    <td>
                                                        <button type="submit" class="btn btn-primary">สั่งอาหาร</button>

                                                    </td>

                                                </form>


                                                </tr>
                                                <?php $i++ ?>
                                            @endforeach
                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">รายการอาหารที่่สั่ง</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                               aria-describedby="example2_info">
                                            <thead>
                                            <th>ลำดับ</th>
                                            <th>รายการอาหาร</th>
                                            {{--<th>ราคา</th>--}}
                                            <th>จำนวน</th>
                                            {{--<th>แก้ไข</th>--}}
                                            <th>ยกเลิก</th>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1?>
                                            @foreach($orders as $listorders)
                                                <tr>

                                                    <td>{{$i}} </td>
                                                    <td>@if(isset($listorders->Menus[0])) {{$listorders->Menus[0]['menu']}}  @endif </td>
                                                    {{--<td>@if(isset($listorders->Menus[0])){{$listorders->Menus[0]['price']}}@endif</td>--}}
                                                    <td> <input value="@if(isset($listorders->Menus[0])){{$listorders->amount}}@endif" type="number" class="form-control" ></td>
                                                    {{--<input value="" type="number" class="form-control" name="amount">--}}
                                                    {{--<td>--}}
                                                        {{--<form action="{{url('/show/update/order/'.$listorders->id)}}" method="get">--}}
                                                            {{--<button type="submit" class="btn btn-block btn-warning"  onclick="return confirm_delete()"> แก้ไข--}}
                                                            {{--</button>--}}
                                                        {{--</form>--}}
                                                    {{--</td>--}}
                                                    <td>
                                                        <form action="{{url('/delete/order/'.$listorders->id)}}" method="get">
                                                            <button type="submit" class="btn btn-block btn-danger">ยกเลิก</button>
                                                        </form>
                                                    </td>

                                                </tr>

                                                <?php $i++ ?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
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


