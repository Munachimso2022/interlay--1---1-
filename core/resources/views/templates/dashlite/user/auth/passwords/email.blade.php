@extends($activeTemplate.'layouts.app')
@section('content')

  <div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
      <!-- content @s -->
      <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
          <div class="brand-logo pb-4 text-center">
            <a href="/" class="logo-link">
              <img class="logo-light logo-img logo-img-lg"
                src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}"
                srcset="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }} 2x" alt="logo">
              <img class="logo-dark logo-img logo-img-lg"
                src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}"
                srcset="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }} 2x" alt="logo-dark">
            </a>
          </div>
          <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title">@lang('Reset Password')</h4>
                  <div class="nk-block-des">
                    <p>Enter your email below. You'll receive instructions on how to reset your password
                    </p>
                  </div>
                </div>
              </div>



              <form action="{{ route('user.password.email') }}" class="mt-4" method="post">
                @csrf
                <div class="form-group">
                  <label>{{ trans('Email Address') }}</label>
                  <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="{{ trans('Email Address') }}" required autocomplete="email" autofocus>
                </div>
                <div class="mt-3">
                  <button type="submit" class="cmn-btn btn btn-primary btn-block">@lang('Send Password Reset
                    Code')</button>
                </div>
              </form>



            </div>
          </div>
        </div>

      </div>
      <!-- wrap @e -->
    </div>
    <!-- content @e -->
  </div>

@endsection
