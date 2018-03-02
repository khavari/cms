@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', __('widgets.home_page'))

{{--------------------------------------------------}}
@section('content')

    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item" aria-current="page">@lang("widgets.manage_widgets")</li>
                <li class="breadcrumb-item" aria-current="page"><a href="{{route('admin.widgets.index')}}">@lang("widgets.widgets")</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang("widgets.home_page")</li>
            </ol>
        </nav>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">@lang("widgets.widgets")</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>@lang("admin.id")</th>
                                <th>@lang("admin.name")</th>
                                <th>@lang("admin.group")</th>
                                <th>@lang("admin.order")</th>
                            </tr>
                            </thead>
                            <tbody id="wp-widgets">
                            @foreach($widgets as $index => $widget)
                                <tr data-id="{{ $widget->getKey() }}">
                                    <td>{{ $widget->getKey() }}</td>
                                    <td>{{ $widget->name }}</td>
                                    <td>{{ $widget->group }}</td>
                                    <td>{{ $widget->order }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{{--------------------------------------------------}}
@section('styles')
@endsection

{{--------------------------------------------------}}
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

    <script>
      var widgets = document.getElementById('wp-widgets')
      var sortable = Sortable.create(widgets, {
        animation: 500,
        dataIdAttr: 'data-id',
        group: "menus",
        scroll: true,
        onEnd: function (evt) {
          var items = sortable.toArray()
          //console.log(items)
          update_order_in_widgets(items)
        }
      })

      function update_order_in_widgets (widgets) {
        $.ajax({
          method: 'post',
          url: '{{ route('admin.widgets.store') }}',
          data: {
            _token: '{{ csrf_token() }}',
            data: {
              'widgets': widgets
            },
          },
          success: function (data) {
            alertSuccess();
            //console.log(data)
          },
          error: function () {
            alert('error')
          }
        })
      }

      function alertSuccess () {
        $('#notification').slideUp();
        setTimeout(function () {
          $('.content-wrapper').prepend('' +
            '<section id="notification" class="alert alert-success animated slideInDown">' +
            '<p>@lang('messages.sorted_success')</p>' +
            '</section>')
        }, 500)

      }
    </script>
@endsection


















