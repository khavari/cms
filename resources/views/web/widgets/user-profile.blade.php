{{-- user-authenticate-rtl.scss user-authenticate-ltr.scss --}}
<section class="user-authenticate" id="user-authenticate">
    <br>
    <div class="container">
        <div class="title-area">
            <h2 class="title mb-4">@lang('web.profile')</h2>
        </div>

        <form class="" method="POST" action="{{ route('profile') }}">
            {{ csrf_field() }} {{ method_field('PATCH') }}
            <div class="form-row">
                {{--------------- name ---------------}}
                <div class="col-md-6 mb-3">
                    <label for="name">@lang('web.name')</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name"
                           value="{{ auth()->user()->name }}" name="name" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="w-100"></div>
                {{--------------- email ---------------}}
                <div class="col-md-6 mb-3">
                    <label for="email">@lang('web.email')</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                           value="{{ auth()->user()->email }}" name="email" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="w-100"></div>
                {{--------------- phone ---------------}}
                <div class="col-md-6 mb-3">
                    <label for="phone">@lang('web.phone')</label>
                    <input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone"
                           value="{{ auth()->user()->phone }}" name="phone">
                    @if ($errors->has('phone'))
                        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <div class="w-100"></div>
                {{--------------- mobile ---------------}}
                <div class="col-md-6 mb-3">
                    <label for="mobile">@lang('web.mobile')</label>
                    <input type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" id="mobile"
                           value="{{ auth()->user()->mobile }}" name="mobile">
                    @if ($errors->has('mobile'))
                        <div class="invalid-feedback">{{ $errors->first('mobile') }}</div>
                    @endif
                </div>
                <div class="w-100"></div>
                {{--------------- address ---------------}}
                <div class="col-md-6  mb-3">
                    <label for="address">@lang('web.address')</label>
                    <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="address"
                           value="{{ auth()->user()->address }}" name="address">
                    @if ($errors->has('address'))
                        <div class="invalid-feedback">{{ $errors->first('address') }}</div>
                    @endif
                </div>
                <div class="w-100"></div>
                {{--------------- gender---------------}}
                <div class="col-md-6  mb-3">
                    <label for="gender">@lang('web.gender') : &nbsp;&nbsp;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="male" name="gender"
                               class="custom-control-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="male" required
                                {{ (auth()->user()->gender == 'male') ? ' checked' : '' }} >
                        <label class="custom-control-label" for="male">@lang('web.male')</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="female" name="gender"
                               class="custom-control-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" value="female" required
                                {{ (auth()->user()->gender == 'female') ? ' checked' : '' }} >
                        <label class="custom-control-label" for="female">@lang('web.female')</label>
                    </div>
                </div>
                <div class="w-100"></div>
                {{--------------- submit---------------}}
                <button class="btn form-btn bg_vibrant" type="submit">@lang('web.submit')</button>

            </div>

        </form>
    </div>
    </div>
    <br>
</section>
