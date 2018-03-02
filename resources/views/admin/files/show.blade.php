@extends('admin.layouts.master')
{{-------------------- Page Title --------------------}}
@section('title', 'همه فایل ها')

{{-------------------- Add Style File --------------------}}
@section('style')
@endsection



{{-------------------- Main Content --------------------}}
@section('content')
    <section class="content-header">
        <h1>
            <small>مدیریت فایل ها:</small>
        </h1>
    </section>

    <section class="content">


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><span class="hidden-xs"></span></h3>
                        <div class="box-tools">
                            <form action="{{route('files.index')}}" method="get">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="search" class="form-control pull-right" placeholder="..."
                                           autofocus required
                                           value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?>">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-info">جستجو</button>
                                        <a href="{{route('files.index')}}" class="btn btn-primary">انصراف</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-bordered table-striped no-margin">
                            <thead>
                            <tr>
                                <th>لینک فایل</th>
                                <th>دانلود</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td class="ltr">{{$file}}</td>
                                    <td><a href="{{asset($file)}}" target="_blank" class="btn btn-xs btn-primary btn-flat">دانلود</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer clearfix">
                    </div>
                </div>
            </div>
        </div>




    </section>
@endsection



{{-------------------- Add Script File --------------------}}
@section('script')

@endsection
