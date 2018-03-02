@extends('admin.layouts.master')
{{-------------------- Page Title --------------------}}
@section('title', 'ثبت فایل جدید')

{{-------------------- Add Style File --------------------}}
@section('style')
@endsection

{{-------------------- Main Content --------------------}}
@section('content')
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>&nbsp;&nbsp;داشبورد</a></li>
            <li><a href="{{route('admin.files.index')}}">لیست فایلها</a></li>
            <li><a href="javascript:void(0)">ثبت فایل جدید</a></li>
        </ol>
    </section>

    <section class="content">
        @include('admin.layouts.messages')


        {{-------------------- User Insert --------------------}}
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">ذخیره فایل جدید</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="{{route('admin.files.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box-body">
                    {{-------------------- title --------------------}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="title">عنوان</label>
                            <input type="text" required class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="عنوان برای بازیابی">
                        </div>
                    </div>
                    {{-------------------- name --------------------}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="file">فایل</label>
                            <input type="file" required class="form-control" id="file" name="file">
                        </div>
                    </div>
                    {{-------------------- title --------------------}}
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="type">استفاده شده در بخش</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value selected disabled>انتخاب کنید</option>
                                @foreach($types as $type)
                                    <option value="{{$loop->index}}" {{ (old('type') == $loop->index) ? 'selected':'' }}>{{$type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    <p class="pull-right">{{asset('uploads/files/'.date('Y').'/'.date('m').'/')}}</p>
                    <button type="submit" class="btn btn-sm btn-success btn-flat">ذخیره</button>
                    <a href="{{route('admin.files.index')}}" class="btn btn-sm btn-info btn-flat">انصراف</a>

                </div>
            </form>
        </div>


    </section>
@endsection



{{-------------------- Add Script File --------------------}}
@section('script')

@endsection