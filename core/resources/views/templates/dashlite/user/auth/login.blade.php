<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('partials.seo')

  {{-- DAHSHLITE CSS --}}
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/dashlite.css') }}">
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/theme.css') }}">
  {{-- DAHSHLITE CSS --}}
<style>
    .bg{background-color:#251144;}
</style>

  @stack('style')
</head>
<body class="nk-body bg">
  <div class="nk-app-root">
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
                  <h4 class="nk-block-title">Sign-In</h4>
                  <div class="nk-block-des">
                    <p>Enter your Username and
                      password to access dashboard.
                    </p>
                  </div>
                </div>
              </div>
              <form action="{{ route('user.login') }}" class="mt-4" method="post" onsubmit="return submitUserForm();">
                @csrf
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">Username</label>
                  </div>
                  <input type="text" name="username" class="form-control form-control-lg" id="default-01"
                    placeholder="Enter your username">
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>
                    <a class="link link-primary link-sm" href="{{ route('user.password.request') }}">Forgot
                      Password?</a>
                  </div>
                  <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                      <em class="passcode-icon icon-show icon ni ni-eye"></em>
                      <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" name="password" class="form-control form-control-lg" id="password"
                      placeholder="Enter your password">
                  </div>
                  <div class="form-control-wrap">
                    <div class="form-group d-flex justify-content-center">
                      @php echo recaptcha() @endphp
                    </div>
                    @include($activeTemplate.'partials.custom-captcha')
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-lg bg btn-primary btn-block">Sign in</button>
                </div>
              </form>
              <div class="form-note-s2 text-center pt-4"> New on our platform? <a
                  href="{{ route('user.register') }}">Create
                  an account</a>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- wrap @e -->
    </div>
    <!-- content @e -->
  </div>





@push('script')
  <script>
    "use strict";

    function submitUserForm() {
      var response = grecaptcha.getResponse();
      if (response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML =
          '<span style="color:red;">@lang("Captcha field is required.")</span>';
        return false;
      }
      return true;
    }

    function verifyCaptcha() {
      document.getElementById('g-recaptcha-error').innerHTML = '';
    }
  </script>
@endpush
