{{-- faq-accordion-ltr.scss faq-accordion-rtl.scss --}}
{{------------------------------------------------------------}}
@inject('feature', 'App\Feature')
<?php $links = $feature->faq(); ?>
<?php $id = rand(1, 1000); ?>
@if($feature->faq()->count() > 0)
    <section class="faq-accordion pt-5 pb-5" id="faq-accordion">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if($links->first()->feature->dimension)
                        <h3 class="title">{{ $links->first()->feature->dimension }}</h3>
                    @endif
                </div>
            </div>
            <div id="accordion-{{$id}}" role="tablist">
                @foreach($links as $index => $link)
                    <div class="card">
                        <div class="card-header" role="tab" id="heading-{{ $index }}">
                            <h5 class="card-title">
                                <a class="@if($index != 0) collapsed @endif" data-toggle="collapse"
                                   href="#collapse-{{$id}}-{{ $index }}" role="button"
                                   aria-expanded="@if($index == 0) true @else false @endif"
                                   aria-controls="collapse-{{$id}}-{{ $index }}">
                                    {{ $link->title }}
                                </a>
                            </h5>
                        </div>
                        <div id="collapse-{{$id}}-{{ $index }}" class="collapse @if($index == 0) show @endif"
                             role="tabpanel"
                             aria-labelledby="heading-{{ $index }}" data-parent="#accordion-{{$id}}">
                            <div class="card-body">
                                <p>{{ $link->summary }}</p>
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


