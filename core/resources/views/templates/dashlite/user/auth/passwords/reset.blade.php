@extends($activeTemplate.'layouts.app')
@section('content')
  <div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
      <!-- content @s -->
      <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
          <div class="brand-logo pb-4 text-center">
            <a href="html/index.html" class="logo-link">
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
                    <p>Reset your password</p>
                  </div>
                </div>
              </div>



              <form method="POST" action="{{ route('user.password.update') }}">
                @csrf

                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                  <label>{{ trans('Password') }}</label>
                  <input type="password" id="email" name="password" class="form-control"
                    placeholder="{{ trans('Password') }}" required>
                </div>
                <div class="form-group">
                  <label>{{ __('Confirm Password') }}</label>
                  <input type="password" id="email" name="password_confirmation" class="form-control"
                    placeholder="{{ trans('Confirm Password') }}" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="cmn-btn">@lang('Reset Password')</button>
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
