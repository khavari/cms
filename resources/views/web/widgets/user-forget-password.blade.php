{{-- user-authenticate-rtl.scss user-authenticate-ltr.scss --}}
<section class="user-authenticate" id="user-authenticate">
    <br>
    <div class="container">
        <div class="title-area mb-3">
            <h2 class="title">@lang('web.forget_password')</h2>
        </div>

        <form class="" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-row">
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
                {{--------------- submit---------------}}
            </div>
            <div class="form-row footer-forget-password">
                <div class="col-md-6">
                <button class="btn form-btn mb-3 bg_vibrant bg_vibrant_hover" type="submit">@lang('web.submit')</button>
                <a href="#" class="form-link">@lang('web.login')</a>
                </div>
            </div>


        </form>
    </div>
    </div>
    <br>
</section>
