@extends('admin.layouts.master')
{{-------------------- Page Title --------------------}}
@section('title', 'مدیریت سایت')

{{-------------------- Add Style File --------------------}}
@section('style')
    <!-- dataTables -->
    <link rel="stylesheet" href="/admin/css/dataTables.bootstrap.min.css">
@endsection

{{-------------------- Main Content --------------------}}
@section('content')
    <section class="content-header">
        <h1><small>پنل مدیریت فارسی</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>خانه</a></li>
            <li><a href="#">محصولات</a></li>
            <li class="active">لوازم ورزشی</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">عنوان</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!
            </div>
            <div class="box-footer">
                پا صفحه
            </div>
        </div>







        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">نمونه جدول شماره دو</h3>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>عنوان</th>
                                <th>خلاصه</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=0;$i<60;$i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>طراحی سایت</td>
                                    <td>لورم ایپسوم</td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">نمونه جدول شماره دو</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>عنوان</th>
                                <th>خلاصه</th>
                                <th>خلاصه</th>
                                <th>خلاصه</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($j=0;$j<240;$j++)
                                <tr>
                                    <td>{{$j}}</td>
                                    <td>طراحی سایت</td>
                                    <td>لورم ایپسوم</td>
                                    <td>لورم ایپسوم</td>
                                    <td>لورم ایپسوم</td>
                                </tr>
                            @endfor
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>شناسه</th>
                                <th>عنوان</th>
                                <th>خلاصه</th>
                                <th>خلاصه</th>
                                <th>خلاصه</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-------------------- Add Script File --------------------}}
@section('script')
    <script src="/admin/js/jquery.dataTables.min.js"></script>
    <script src="/admin/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        });
    </script>
@endsection