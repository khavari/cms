{{-- user-login-modal-ltr.scss user-login-modal-ltr.scss --}}
<div class="modal fade user-login-modal" id="user-login-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('web.login')</h4>
                </div>
                <div class="modal-body">
                    {{--------------- email ---------------}}
                    <div class="form-group">
                        <label for="email">@lang('web.email')</label>
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                               value="{{ old('email') }}" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    {{--------------- password ---------------}}
                    <div class="form-group">
                        <label for="password">@lang('web.password')</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                               id="password" name="password" required>
                        @if ($errors->has('password'))
                            <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    {{--------------- label ---------------}}
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" id="remember"
                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label label-checkbox" for="remember">@lang('web.remember_me')</label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn form-btn btn-primary" type="submit">@lang('web.login')</button>
                    @if(env('GOOGLE_CLIENT_ID'))
                        <a href="{{ route('socialite',['driver'=>'google']) }}" class="btn btn-default login-btn "
                           type="submit"> <i class="fa fa-google-plus"></i> @lang('web.sign_in_with_google-plus')</a>
                    @endif

                </div>
            </form>
        </div>
    </div>
</div>
