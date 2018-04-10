
@inject('model', 'App\ProductCategory')
<?php $categories = $model->active()->lang()->featured()->get(); ?>

<section id="featured-categories" class="featured-categories pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="caption mt-5 mb-5">
                    @lang('web.product_categories')
                </h3>
            </div>
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="{{ setting('category_grid') }}">
                    <div class="entity">
                        <a href="{{ $category->url() }}" title="{{ $category->title }}" class="wp-img">
                            <img src="{{ asset('media/'.$category->image) }}?w=400&h=400&fit=crop"
                                 alt="{{ $category->title }}" class="img-fluid">
                        </a>
                        <div class="wp-title">
                            <a href="{{ $category->url() }}" class="title"
                               title="{{ $category->title }}">{{ $category->title }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
