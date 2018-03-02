{{-- contact_form-rtl.scss -contact_form-ltr.scss --}}
<section id="contact_form" class="contact_form pt-5 pb-5">
    <div class="container">
        <form action="{{route('contact-us')}}#contact_form" name="form" method="post">
            {{ csrf_field() }}
            <div class="form-group row">
                {{--------------- alert ---------------}}
                @if (Session::has('success'))
                    <div class="col-12 mt-5">
                        <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                    </div>
                @endif
                {{--------------- name ---------------}}
                <div class="col-12 col-md-6">
                    <label for="name">@lang('web.name')</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                           value="{{ old('name') }}" name="name" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                {{--------------- email ---------------}}
                <div class="col-12 col-md-6">
                    <label for="email">@lang('web.email')</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                           value="{{ old('email') }}" name="email" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                {{--------------- message ---------------}}
                <div class="col-12">
                    <label for="message">@lang('web.message')</label>
                    <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" id="message"
                              name="message" rows="3" required>{{ old('message') }}</textarea>
                    @if ($errors->has('message'))
                        <div class="invalid-feedback">{{ $errors->first('message') }}</div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-flat btn-primary">@lang('web.submit')</button>
        </form>
    </div>
</section>
