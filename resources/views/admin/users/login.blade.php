<!DOCTYPE html>
<html>
@include('admin.master.head')
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="">{{ setting('admin.title') }}</a>
    </div>
    <div class="login-box-body animated @if ($errors->has('*'))jello @else fadeInUp @endif">
        @if ($errors->has('*'))
            <p class="login-box-msg text-red">{{ $errors->first('email') }}</p>
        @else
            <p class="login-box-msg">@lang('admin.login_to_admin')</p>
        @endif
        <form method="POST" action="{{ route('admin') }}">
            {{ csrf_field() }}
            <input type="checkbox" name="remember" class="hidden" {{ old('remember') ? 'checked' : '' }}>
            <div class="form-group has-feedback {{ $errors->has('*') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('username') }}" required
                       placeholder="Email">
                <span class="form-control-feedback fa fa-envelope-o"></span>
            </div>
            <div class="form-group has-feedback {{ $errors->has('*') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="form-control-feedback fa fa-key"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('admin.sign_in')</button>
                </div>
            </div>
        </form>
        <br>
        <a href="#">@lang('admin.forget_password')</a><br>
    </div>
</div>
<script src="{{ asset('assets/admin/js/admin.ltr.min.js') }}"></script>
</body>
</html>
