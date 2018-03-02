{{-- user-authenticate-rtl.scss user-authenticate-ltr.scss --}}
<section class="user-authenticate" id="user-authenticate">
    <br>
    <div class="container">
        <div class="title-area mb-3">
            <h2 class="title">@lang('web.register')</h2>
        </div>

        <form class="" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-row">
                    {{--------------- name ---------------}}
                    <div class="col-md-6 mb-3  ">
                        <label for="name">@lang('web.name')</label>
                        <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                               value="{{ old('name') }}" name="name" required>
                        @if ($errors->has('name'))
                            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="w-100"></div>
                    {{--------------- email ---------------}}
                    <div class="col-md-6 mb-3 ">
                        <label for="email">@lang('web.email')</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                               value="{{ old('email') }}" name="email" required>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="w-100"></div>
                    {{--------------- password ---------------}}
                    <div class="col-md-6 mb-3 ">
                        <label for="password">@lang('web.password')</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                               id="password" name="password" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="w-100"></div>

                    {{--------------- password_confirmation ---------------}}
                    <div class="col-md-6 mb-3 ">
                        <label for="password_confirmation">@lang('web.password_confirmation')</label>
                        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               id="password_confirmation" name="password_confirmation" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="w-100"></div>
                    {{--------------- gender---------------}}
                    <div class="col-md-6 mb-3 ">
                        <label for="gender">@lang('web.gender') : &nbsp;&nbsp;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="male" name="gender"
                                   class="custom-control-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="male" required
                                    {{ (old('gender') == 'male') ? ' checked' : '' }} >
                            <label class="custom-control-label" for="male">@lang('web.male')</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="female" name="gender"
                                   class="custom-control-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="female" required
                                    {{ (old('gender') == 'female') ? ' checked' : '' }} >
                            <label class="custom-control-label" for="female">@lang('web.female')</label>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    {{--------------- submit---------------}}

                    <button class="btn form-btn mb-3 bg_vibrant bg_vibrant_hover" type="submit">@lang('web.submit')</button>
                    <div class="w-100"></div>

            </div>

        </form>
    </div>
    </div>
    <br>
</section>
