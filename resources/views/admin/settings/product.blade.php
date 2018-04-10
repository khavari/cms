@extends('admin.master.master')

{{--------------------------------------------------}}
@section('title', __('admin.products'))

{{--------------------------------------------------}}
@section('content')
    <section class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">@lang("admin.dashboard")</a></li>
                <li class="breadcrumb-item" aria-current="page">@lang("admin.manage_settings")</li>
                <li class="breadcrumb-item active" aria-current="page">@lang('admin.products')</li>
            </ol>
        </nav>
    </section>

    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-sitemap"></i> @lang('admin.products')</h3>
                    </div>
                    <form role="form" action="{{route('admin.settings.update',['group'=>'product'])}}" method="post">
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                        <div class="box-body">
                           <div class="row">
                               {{-------------------- currency --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="currency">@lang('admin.currency')</label>
                                       <input type="text" name="settings[currency]"
                                              class="form-control"
                                              value="{{$setting['currency']}}"
                                              id="currency">
                                   </div>
                               </div>
                               {{-------------------- products_per_page --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="products_per_page">@lang('admin.products_per_page')</label>
                                       <input type="number" name="settings[products_per_page]"
                                              class="form-control"
                                              value="{{$setting['products_per_page']}}"
                                              id="products_per_page">
                                   </div>
                               </div>
                               {{-------------------- enable_cart --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="enable_cart">@lang('admin.enable_cart')</label>
                                       <select name="settings[enable_cart]" class="form-control" id="enable_cart">
                                           <option value="0" {{ ($setting['enable_cart'] == 0)?'selected':'' }}>@lang('admin.no')</option>
                                           <option value="1" {{ ($setting['enable_cart'] == 1)?'selected':'' }}>@lang('admin.yes')</option>
                                       </select>
                                   </div>
                               </div>
                               {{-------------------- product_grid --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="product_grid">@lang('admin.product_grid')</label>
                                       <input type="text" name="settings[product_grid]"
                                              class="form-control ltr"
                                              value="{{$setting['product_grid']}}"
                                              id="product_grid">
                                   </div>
                               </div>
                               {{-------------------- category_grid --------------------}}
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="category_grid">@lang('admin.category_grid')</label>
                                       <input type="text" name="settings[category_grid]"
                                              class="form-control ltr"
                                              value="{{$setting['category_grid']}}"
                                              id="category_grid">
                                   </div>
                               </div>

                           </div>
                        </div>
                        <div class="box-footer">
                            @include('admin.partials.update')
                        </div>
                    </form>
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
@endsection
