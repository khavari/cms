@if($featured === 1)
    <a href="{{ $action }}?featured=toggle" class="text-success"><i class="fa  fa-toggle-on"></i></a>
@elseif($featured === 0)
    <a href="{{ $action }}?featured=toggle" class="text-gray"><i class="fa  fa-toggle-on"></i></a>
@endif
