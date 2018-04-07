<section id="contents-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url(app()->getLocale()) }}">@lang('web.home')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url($product->category->url()) }}">{{ $product->category->title }}</a>
                        </li>
                        <li class="breadcrumb-item">{{ $product->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-12">
                <div class="wp-page mb-3">
                    @if($product->existImage())
                        <div class="wp-image">
                            <img src="{{ asset($product->image) }}" class="img-fluid animated fadeIn"
                                 alt="{{ $product->title }}" style="max-width:600px;">
                        </div>
                    @endif
                    <div class="header border_vibrant">
                        <h2 class="title pr-0 pl-0">{{ $product->title }}</h2>
                    </div>
                    <div class="editor">
                        {!! $product->body !!}
                    </div>

                </div>
            </div>
        </div>

        @includeIf('web.widgets.partial-gallery',['images' => $product->images()->active()->get()])

    </div>
</section>
