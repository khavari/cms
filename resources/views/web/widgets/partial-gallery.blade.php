@if($images->count())
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="partial-gallery mb-3">
                <h6 class="caption"><i class="fa fa-image"></i>&nbsp;&nbsp;@lang('web.gallery')</h6>
                <div class="row" id="lightgallery">
                    @foreach($images as $image)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 p-0" data-src="{{ asset($image->image) }}">
                            <div class="gallery-item">
                                    <img src="{{ asset('media/'.$image->image) }}?w=400&h=350&fit=crop"
                                         class="img-fluid image animated fadeIn"
                                         alt="{{ $image->alt }}" title="{{ $image->title }}">
                                <p class="title">{{ $image->title }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
