{{-- googlemap-rtl.scss -googlemap-ltr.scss --}}
@if(setting('map.title'))
    <section id="googlemap" class="googlemap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-5 p-0">
                    <div class="contact-info bg_dark text_bg_dark">
                        <div class="row">
                            <div class="col-12 mt-3 fa-hover">
                                @if(setting('contact.title'))
                                    <h6 class="title mb-4">{{ setting('contact.title') }}</h6>
                                @endif
                                @if(setting('contact.phone'))
                                    <p><span>@lang('web.phone') :</span> &nbsp;{{ setting('contact.phone') }}</p>
                                @endif
                                @if(setting('contact.mobile'))
                                    <p><span>@lang('web.mobile') :</span> &nbsp;{{ setting('contact.mobile') }}</p>
                                @endif
                                @if(setting('contact.email'))
                                    <p><span>@lang('web.email') :</span> &nbsp;{{ setting('contact.email') }}</p>
                                @endif
                                @if(setting('contact.postal'))
                                    <p><span>@lang('web.postal') :</span> &nbsp;{{ setting('contact.postal') }}</p>
                                @endif
                                @if(setting('contact.address'))
                                    <p><span>@lang('web.address') :</span> &nbsp;{{ setting('contact.address') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-7 p-0">
                    <div id="google_map" data-latitude="{{ setting('map.latitude') }}"
                         data-longitude="{{ setting('map.longitude') }}" data-zoom="15"
                         data-title="{{ setting('map.title') }}"></div>
                </div>
            </div>
        </div>
    </section>
    <script>
      function myMap () {
        var mapCanvas = document.getElementById('google_map')
        var latitude = mapCanvas.getAttribute('data-latitude')
        var longitude = mapCanvas.getAttribute('data-longitude')
        var map_zoom = Number(mapCanvas.getAttribute('data-zoom'))
        var map_title = mapCanvas.getAttribute('data-title')

        var myCenter = new google.maps.LatLng(latitude, longitude)
        var mapOptions = {center: myCenter, zoom: map_zoom}
        var map = new google.maps.Map(mapCanvas, mapOptions)
        var marker = new google.maps.Marker({
          position: myCenter,
          animation: google.maps.Animation.BOUNCE,
          title: map_title
        })
        marker.setMap(map)
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmVngEaLEsqkq9TGbWRN0zhwJtwpGMOu0&callback=myMap"></script>
@else
    @include('web.widgets.empty')
@endif
