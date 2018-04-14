<section id="product-widget">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb" class="custom-breadcrumb">
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
            <div class="col-12">
                <div class="info">


                    <div class="row">
                        <div class="col-12 col-md-7">
                           <div class="details">
                               <div class="header">
                                   <h3 class="title">{{ $product->title }}</h3>
                                   <h3 class="slug">{{ $product->slug }}</h3>
                                   <p class="category">@lang('web.category') : <a href="">{{ $product->category->title }}</a></p>
                               </div>
                               <div class="money">
                                   @if($product->discount())
                                   <p class="old_price">
                                       <span class="price">@lang('web.price') : </span>
                                       <span class="amount">{{ number_format($product->old_price) }}</span>
                                       <span class="currency">{{ setting('currency') }}</span>
                                       <span class="discount">{{ number_format($product->discount()) }} {{ setting('currency') }} @lang('web.discount')</span>
                                   </p>
                                   @endif

                                   <p class="final_price">
                                       <span class="unit">@lang('web.final_price') : </span>
                                       <span class="amount">{{ number_format($product->price()) }}</span>
                                       <span class="currency">{{ setting('currency') }}</span>
                                   </p>

                               </div>
                               <div class="summary">
                                   <p>{{ $product->summary }}</p>
                               </div>
                               <div class="submit">
                                       <button type="submit" class="add_to_cart ">@lang('web.add_to_cart')</button>
                               </div>
                           </div>
                        </div>


                        <div class="col-12 col-md-5">
                            <div class="image">
                                <img src="{{ asset($product->image) }}" class="img-fluid animated fadeIn">
                            </div>

                            <div class="product-gallery  owl-carousel " id="lightgallery" style="direction: ltr">
                                @foreach($product->images()->active()->get()  as $image)
                                    <div class="th-image item" data-src="{{ asset($image->image) }}">
                                        <img src="{{ asset('media/'.$image->image) }}?w=150&h=150&fit=crop">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>


        <div class="row">
            <div class="col-12 col-md-12">
                <div class="product-body mb-3">

                    <h6 class="caption"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;@lang('web.product_verview')</h6>

                    <div class="editor">
                        <h6 class="title">{{ $product->title }}</h6>
                        {!! $product->body !!}
                    </div>

                </div>
            </div>
        </div>


    </div>
</section>
