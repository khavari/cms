<form method="post" class="inline destroy" action="{{ $action }}">
    {{ csrf_field() }} {{ method_field('DELETE') }}
    <input class="btn btn-xs btn-flat btn-danger" type="submit" value="@lang('admin.delete')" data-alert="@lang('messages.confirm_delete')">
</form>
