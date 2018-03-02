@inject('widget', 'App\Widget')
@if($widget->group('header')->lang()->active()->first())
    @includeIf($widget->group('header')->lang()->active()->first()->path)
@endif
