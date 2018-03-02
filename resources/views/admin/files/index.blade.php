@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title',  __('admin.files'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        @include('admin.partials.breadcrumb',[
            'crumbs' => [
                ['title' => __('admin.manage_files')],
                ['title' => __('admin.files'), 'class' => 'active'],
            ],
        ])
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header with-border">

                        <button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-file">
                            @lang('admin.submit_new_file')
                        </button>
                        <div class="box-tools">
                            @include('admin.partials.search')
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>@lang('admin.type')</th>
                                <th>@lang('admin.title')</th>
                                <th>@lang('admin.link')</th>
                                <th>@lang('admin.size')</th>
                                <th>@lang('admin.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $file)
                                <tr class="{{ (isUpdated($file->updated_at))? 'updated' : '' }}">
                                    <td>
                                        @if(in_array($file->extension,['png','jpg','jpeg','gif']))
                                            <i class="fa fa-file-image-o"></i>
                                        @elseif($file->extension == 'pdf')
                                            <i class="fa fa-file-pdf-o"></i>
                                        @elseif(in_array($file->extension,['zip','rar']))
                                            <i class="fa fa-file-zip-o"></i>
                                        @elseif(in_array($file->extension,['doc','docx']))
                                            <i class="fa fa-file-word-o"></i>
                                        @elseif(in_array($file->extension,['xls','xlsx']))
                                            <i class="fa fa-file-excel-o"></i>
                                        @elseif($file->extension == 'txt')
                                            <i class="fa fa-file-text-o"></i>
                                        @elseif($file->extension == 'mp4')
                                            <i class="fa fa-file-video-o"></i>
                                        @else
                                            <i class="fa fa-file"></i>
                                        @endif

                                    </td>
                                    <td>{{ str_limit($file->title, 30) }}</td>
                                    <td class="ltr">{{ asset($file->file) }}</td>
                                    <td class="ltr">{{ byte_convert($file->size) }}</td>
                                    <td>
                                        @include('admin.partials.delete',['action'=>route('admin.files.destroy', ['id' => $file->id])])
                                        <a href="" class="btn btn-xs btn-flat btn-primary" data-toggle="modal" data-target="#modal-file-{{$file->id}}">@lang('admin.edit')</a>
                                        @include('admin.partials.show',['action'=>route('admin.files.show', ['id' => $file->id])])
                                        @include('admin.partials.download',['action'=>asset($file->file)])
                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-file-{{ $file->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form role="form" action="{{route('admin.files.update', ['id' => $file->id])}}" method="post">
                                                {{ csrf_field() }} {{ method_field('PATCH') }}
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">@lang('admin.submit_new_file')</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {{--------------- title ---------------}}
                                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                                        <label for="title">@lang('admin.title')</label>
                                                        <input type="text" required class="form-control" id="title" name="title"
                                                               value="{{ $file->title }}">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-flat btn-primary">@lang('admin.update')</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($files->hasPages())
                        <div class="box-footer">
                            {{$files->appends($_GET)->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>



    <div class="modal fade" id="modal-file">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.files.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('admin.submit_new_file')</h4>
                </div>
                <div class="modal-body">
                    {{--------------- file ---------------}}
                    <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file">@lang('admin.file')</label>
                        <input type="file" required class="form-control" id="file" name="file">
                    </div>

                    {{--------------- title ---------------}}
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title">@lang('admin.title')</label>
                        <input type="text" required class="form-control" id="title" name="title"
                               value="{{old('title')}}">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-flat btn-default pull-left" data-dismiss="modal">@lang('admin.close')</button>
                    <button type="submit" class="btn btn-flat btn-primary">@lang('admin.submit')</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

{{--------------------------------------------------}}
@section('scripts')
@endsection

{{--------------------------------------------------}}
@section('styles')
@endsection
