<div class="partial-downloads mb-3">
    <div class="row">
        <h2 class="title border_vibrant">@lang('web.download')</h2>
    </div>

    @for($i=0;$i<3;$i++)
    <div class="row br align-items-center">

            <div class="col-12 col-sm-4  col-lg-3  ">
               <div class="content">@lang('lorem.1')</div>
            </div>

        <div class="col-12 col-sm-4 col-lg-3">
            <div class="content">@lang('lorem.5')</div>
        </div>

        <div class="col-12 col-sm-4 col-lg-3 ">
             <div class="content"><a href="#">@lang('lorem.5')</a></div>
        </div>

    </div>
    @endfor
</div>
