{{--------------------------------------------------}}
<form class="inline-block" action="{{ request()->url() }}">
    <div class="input-group input-group-sm" style="width: 200px;">
        <input type="text" name="search" class="form-control" required placeholder="@lang('admin.search')" value="{{ request()->search }}">
        <div class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="fa fa-search" style="height: 20px;"></i></button>
            @if(request()->search)
                <a href="{{ request()->url() }}" class="btn btn-default"><i class="fa fa-refresh" ></i></a>
            @endif
        </div>
    </div>
</form>
