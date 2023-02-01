
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
 <div class="nk-main bg ">
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
                  <h4 class="nk-block-title">Sign-Up</h4>
                  <div class="nk-block-des">
                    <p>Create an account to gain access to {{ __(@$loginContent->data_values->heading_c) }} panel.
                    </p>
                  </div>
                </div>
              </div>
              <form action="{{ route('user.register') }}" class="mt-4" method="post"
                onsubmit="return submitUserForm();">
                @csrf

                @if (session()->get('reference') != null)
                  <div class="form-group">
                    <div class="form-label-group">
                      <label class="form-label" for="default-01">@lang('Reference')</label>
                    </div>
                    <input type="text" name="referBy" class="form-control" id="referenceBy"
                      placeholder="{{ trans('Reference By') }}" value="{{ session()->get('reference') }}" readonly>
                  </div>
                @endif

                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">@lang('First Name')</label>
                  </div>
                  <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}"
                    placeholder="@lang('First Name')" required>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">@lang('Last Name')</label>
                  </div>
                  <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}"
                    placeholder="@lang('Last Name')" required>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">{{ __('Country') }}</label>
                  </div>
                  <select name="country" id="country" class="form-control">
                    @foreach ($countries as $key => $country)
                      <option data-mobile_code="{{ $country->dial_code }}" value="{{ $country->country }}"
                        data-code="{{ $key }}">{{ __($country->country) }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">{{ trans('Mobile') }}</label>
                  </div>
                  <div class="input-group ">
                    <div class="input-group-prepend">
                      <span class="input-group-text mobile-code">
                      </span>
                      <input type="hidden" name="mobile_code">
                    </div>
                    <input type="text" name="mobile" class="form-control" value="{{ old('mobile') }}"
                      placeholder="@lang('Your Phone Number')" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">@lang('Email Address')</label>
                  </div>
                  <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                    placeholder="@lang('Enter email address')" required>
                </div>

                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">Username</label>
                  </div>
                  <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                    placeholder="@lang('User Name')" required>
                </div>

                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">@lang('Password')</label>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="@lang('Enter password')"
                    required>
                </div>

                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="default-01">{{ trans('Confirm Password') }}</label>
                  </div>
                  <input type="password" name="password_confirmation" class="form-control"
                    placeholder="@lang('Confirm Password')" required>
                </div>

                @php
                  $links = getContent('links.element', '', '', 1);
                @endphp
                <div class="form-row mt-2">
                  <div class="col-md-12">
                    <input type="checkbox" name="terms" required> <span class="f-size-14 ml-2">@lang('I agree with')
                      @foreach ($links as $link)
                        <a class="base--color"
                          href="{{ route('linkDetails', [slug($link->data_values->title), $link->id]) }}">
                          @lang($link->data_values->title)</a>
                        @if (!$loop->last) , @endif
                      @endforeach
                    </span>
                  </div>
                </div>


                <div class=" form-group">
                  <div class="form-group d-flex justify-content-center">
                    @php echo recaptcha() @endphp
                  </div>
                  @include($activeTemplate.'partials.custom-captcha')
                </div>

                <div class="form-group">
                  <button class="btn btn-lg bg btn-primary btn-block">Sign up</button>
                </div>

              </form>

            </div>

            <div class="form-note-s2 text-center pt-4"> Already have an account? <a
                href="{{ route('user.login') }}">Sign in</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- wrap @e -->
  </div>
  <!-- content @e -->
  </div>




@push('style')
  <style>
    .input-group-text {
      color: #fff;
    }

  </style>
@endpush
@push('script')
  <script>
    "use strict";
    @if ($mobile_code)
      $(`option[data-code={{ $mobile_code }}]`).attr('selected','');
    @endif

    $('select[name=country]').change(function() {
      $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
      $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
    });
    $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
    $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));

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

@stack('script-lib')

  <script src="{{ asset($activeTemplateTrue . '/js/bundle.js?ver=2.4.0') }}"></script>
  <script src="{{ asset($activeTemplateTrue . '/js/scripts.js?ver=2.4.0') }}"></script>


  @include($activeTemplate.'partials.notify')
  @include('partials.plugins')

  @stack('script')

  <script>
    (function() {
      "use strict";
      $(document).on("change", ".langSel", function() {
        window.location.href = "{{ url('/') }}/change/" + $(this).val();
      });

      $('.policy').on('click', function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.get('{{ route('cookie.accept') }}', function(response) {
          iziToast.success({
            message: response,
            position: "topRight"
          });
          $('.cookie__wrapper').addClass('d-none');
        });
      });
    })();
  </script>
