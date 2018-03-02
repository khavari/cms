@extends('admin.layouts.master')
{{-------------------- Page Title --------------------}}
@section('title', 'مدیریت سایت')

{{-------------------- Add Style File --------------------}}
@section('style')
    <link rel="stylesheet" href="/admin/css/select2.min.css">
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

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">سلکت دو</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>عنوان فیلد</label>
                            <select class="form-control select2" >
                                <option selected="selected">محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>عنوان فیلد</label>
                            <select class="form-control select2" disabled="disabled">
                                <option selected="selected">Alabama</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>عنوان فیلد</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State">
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                                <option>محصولات</option>
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>عنوان فیلد</label>
                            <select class="form-control select2">
                                <option selected="selected">Alabama</option>
                                <option>Alaska</option>
                                <option disabled="disabled">California (disabled)</option>
                                <option>Delaware</option>
                                <option>Tennessee</option>
                                <option>Texas</option>
                                <option>Washington</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <p>لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!لورم ایپسوم یا طرح‌نما به متنی آزمایشی!</p>
            </div>
        </div>







    </section>
@endsection

{{-------------------- Add Script File --------------------}}
@section('script')
    <script src="/admin/js/select2.full.min.js"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection