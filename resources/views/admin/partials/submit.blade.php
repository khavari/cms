<button type="submit" class="btn btn-md btn-flat btn-success">@lang('admin.submit')</button>
@if(url()->previous() != url()->current())
    <a href="{{ url()->previous() }}" class="btn btn-md btn-flat btn-primary">@lang('admin.back')</a>
@endif


