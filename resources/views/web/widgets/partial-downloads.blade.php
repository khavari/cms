<div class="partial-downloads mb-3">
    <div class="row">
        <h2 class="title border_vibrant">@lang('web.download')</h2>
    </div>
    <div class="row">
        @for($i=0;$i<8;$i++)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3   mb-4">
                <a href="#">
                    <div class="image">
                        {{--<img src="{{ asset($content->image) }}" class="img-fluid animated fadeIn"--}}
                        {{--alt="{{ $content->title }}">--}}
                    </div>
                    <div class="content">
                        <div class="title-inner">@lang('lorem.3')</div>
                        <div class="body">@lang('lorem.6')</div>
                    </div>
                </a>
            </div>
        @endfor
    </div>
</div>
