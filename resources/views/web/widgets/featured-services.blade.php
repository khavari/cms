{{-- featured-services-rtl.scss -featured-services-ltr.scss --}}
@inject('Vocabulary', 'App\Vocabulary')
<?php $contents = $Vocabulary->featuredContents('service'); ?>
@if($contents->count())
    <section id="featured-services" class="featured-services">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="title mb-3 mt-3">@lang('web.featured_services')</h3>
                </div>
            </div>
            <div class="row">
                @foreach($contents as $content)
                    <div class="col-12 col-md-6 col-lg-4 mb-3">
                        <div class="services-item">
                            <div class="image">
                                <a href="{{ $content->url() }}">
                                    <img src="{{ asset('media/'.$content->image) }}?w=200&h=200&fit=crop" alt="{{ $content->title }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="body">
                                <a href="{{ $content->url() }}"><h6 class="title">{{ $content->title }}</h6></a>
                                <div class="txt">{{ str_limit($content->summary,150) }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@else
    @include('web.widgets.empty')
@endif
