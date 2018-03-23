@inject('widget', 'App\Widget')
@if($widget->group('footer')->lang()->active()->first())
    @includeIf($widget->group('footer')->lang()->active()->first()->path)
@endif

@foreach($widget->group('master')->lang()->active()->get() as $component)
    @includeIf($component['path'])
@endforeach
