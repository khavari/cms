{{-- introduction-rtl.scss introduction-ltr.scss --}}
@if(setting('introduction'))
    <section class="introduction pt-5 pb-5 bg_vibrant">
        <div class="container">
            <div class="row editor">
                {!! setting('introduction') !!}
            </div>
        </div>
    </section>
@else
    @include('web.widgets.empty',['name'=>'introduction'])
@endif
