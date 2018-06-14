@extends('layouts.app')
@section('styles')

@section('content')
    <div id="app">
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
            <section class="content" id="example-1">
                <div class="row">
                    <div class="col-xs-6">
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
                                        <div class="col-sm-7">
                                            <table id="example1" class="table table-bordered table-hover dataTable"
                                                   role="grid"
                                                   aria-describedby="example2_info">
                                                <thead>
                                                <tr>
                                                    <th>ลำดับ</th>
                                                    <th>รายการอาหาร</th>
                                                    <th>ราคา</th>
                                                    <th>#</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                <tr v-for=" data in menus">
                                                    <td> @{{ data.id }}</td>
                                                    <td> @{{ data.menu }}</td>
                                                    <td> @{{ data.price }}</td>
                                                    <td><input type="button" class="btn btn-primary" value="เลือก"
                                                               v-on:click="addOder(data.id)"></td>

                                                </tr>


                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->


                        <!-- /.box -->
                    </div>
                    <div class="col-xs-6">
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
                                            <table id="example1" class="table table-bordered table-hover dataTable"
                                                   role="grid"
                                                   aria-describedby="example2_info">
                                                <thead>
                                                <th>ลำดับ</th>
                                                <th>รายการอาหาร</th>
                                                <th>ราคา</th>
                                                <th>จำนวน</th>
                                                <th>สั่งอาหาร</th>
                                                </thead>

                                                <tbody>
                                                <tr v-for="(list_order,index)  in order">
                                                    <td> @{{ list_order.id }}</td>
                                                    <td> @{{ list_order.menu }}</td>
                                                    <td> @{{ list_order.price }}</td>
                                                    <td><input type="number" value="1"></td>
                                                    <td><input type="button" class="btn btn-warning" value="ลบ"
                                                               @click="deleteOder(index)"></td>

                                                </tr>


                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
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
    </div>

@endsection
@push('scripts')


    {{-- cdn vue--}}
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.2/vue-resource.min.js"
            charset="utf-8"></script>
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

        new Vue({
            el: '#example-1',
            data: {
                menus: [],
                order: []
            },
            methods: {
                getMenus: function () {
                    this.$http.get('get/data/menu').then(function (response) {

                        this.menus = response.data.menus;
                        // console.log(this.menus)
                    }, function (response) {
                        // error callback
                    });
                },
                addOder: function (event) {
                    this.$http.get('get/data/order/' + event).then(function (response) {
                        this.order.push(response.data.menus[0]);
                        console.log(this.order)
                    }, function (response) {
                        // error callback
                    });

                },
                deleteOder: function (event) {
            alert(event)

                },

            },
            ready: function () {
                this.getMenus();
            }
        })
        // new Vue({
        //      el: '#order',
        //      data: {
        //          message: 'Hello Vue!',
        //          menus:[],
        //      },
        //     methods:{
        //         getMenus: function(){
        //             this.$http.get('get/data/order').then(function(response){
        //
        //                 this.menus = response.data.menus;
        //                 console.log(this.menus)
        //             }, function(response){
        //                 // error callback
        //             });
        //         }},
        //     ready: function(){
        //         this.getMenus();
        //     }
        //
        //
        //
        //  })
    </script>

    {{--<script>--}}
    {{--$(function () {--}}
    {{--$('#example1').DataTable()--}}
    {{--$('#example2').DataTable({--}}
    {{--'paging': true,--}}
    {{--'lengthChange': false,--}}
    {{--'searching': false,--}}
    {{--'ordering': true,--}}
    {{--'info': true,--}}
    {{--'autoWidth': false--}}
    {{--})--}}
    {{--})--}}


    {{--</script>--}}








@endpush


