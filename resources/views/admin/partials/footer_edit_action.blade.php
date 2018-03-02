<a href="{{ $action }}" class="btn btn-md btn-flat btn-primary">Edit record</a>
@if(url()->previous() != url()->current())
    <a href="{{ url()->previous() }}" class="btn btn-md btn-flat btn-default">@lang('admin.back')</a>
@endif


