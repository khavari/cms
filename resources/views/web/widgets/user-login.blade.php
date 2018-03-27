{{-- user-authenticate-rtl.scss user-authenticate-ltr.scss --}}
<section class="user-authenticate" id="user-authenticate">
    <br>
    <div class="container">
        <div class="title-area">
            <h2 class="title mb-3">@lang('web.login')</h2>
        </div>

        <form class="" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-row">

                {{--------------- email ---------------}}
                <div class="col-md-6 mb-3">
                    <label for="email">@lang('web.email')</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                           value="{{ old('email') }}" name="email" required autofocus>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="w-100"></div>
                {{--------------- password ---------------}}
                <div class="col-md-6 mb-3">
                    <label for="password">@lang('web.password')</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                           id="password" name="password" required>
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="w-100"></div>
                {{--------------- remember ---------------}}
                <div class="col-md-6 mb-3">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="remember"
                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label label-checkbox"
                               for="remember">@lang('web.remember_me')</label>
                    </div>
                </div>

                <div class="w-100"></div>
                {{--------------- submit---------------}}
                <div class="col-md-6 mb-3">
                    <button class="btn form-btn btn-primary" type="submit">@lang('web.submit')</button>
                </div>
                <div class="w-100"></div>
                {{--------------- login with social---------------}}
                <div class="col-md-6 mb-3">
                    @if(env('GOOGLE_CLIENT_ID'))
                        <a href="{{ route('socialite',['driver'=>'google']) }}" class="btn  login-btn border_vibrant "
                           type="submit"> <i class="fa fa-google-plus"></i> @lang('web.sign_in_with_google-plus')</a>
                    @endif

                    @if(env('FACEBOOK_CLIENT_ID'))
                        <a href="{{ route('socialite',['driver'=>'facebook']) }}" class="btn  login-btn border_vibrant "
                           type="submit"> <i class="fa fa-facebook"></i> @lang('web.sign_in_with_facebook')</a>
                    @endif

                    @if(env('LINKEDIN_CLIENT_ID'))
                        <a href="{{ route('socialite',['driver'=>'linkedin']) }}" class="btn  login-btn border_vibrant "
                           type="submit"> <i class="fa fa-linkedin"></i> @lang('web.sign_in_with_linkedin')</a>
                    @endif

                    @if(env('GITHUB_CLIENT_ID'))
                        <a href="{{ route('socialite',['driver'=>'github']) }}" class="btn  login-btn border_vibrant "
                           type="submit"> <i class="fa fa-github"></i> @lang('web.sign_in_with_github')</a>
                    @endif

                </div>
            </div>

        </form>
    </div>
    </div>
    <br>
</section>
{{--{{ old('remember') ? 'checked' : '' }}--}}
