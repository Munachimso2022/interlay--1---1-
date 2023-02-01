@extends('templates.basic.layouts.app')

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
                  <h4 class="nk-block-title">{{ __('Confirm Password') }}</h4>
                  <div class="nk-block-des">
                    <p>Please confirm your password before continuing.</p>
                  </div>
                </div>
              </div>


              <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="current-password">

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Confirm Password') }}
                    </button>

                    @if (Route::has('password.request'))
                      <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                      </a>
                    @endif
                  </div>
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
