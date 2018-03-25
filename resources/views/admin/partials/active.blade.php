@if($active)
    <a href="{{ $action }}?active=toggle" class="text-success"><i class="fa  fa-toggle-on"></i></a>
@elseif( ! $active)
    <a href="{{ $action }}?active=toggle" class="text-gray"><i class="fa  fa-toggle-on"></i></a>
@endif
