@extends($activeTemplate.'layouts.frontend')
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
                  <h4 class="nk-block-title">@lang($page_title)</h4>
                  <div class="nk-block-des">
                    <p>@lang('Enter Verification Code')</p>
                  </div>
                </div>
              </div>


              <form action="{{ route('user.verify_sms') }}" method="POST">
                @csrf

                <div class="form-group">
                  <div id="phoneInput">

                    <div class="field-wrapper">
                      <div class=" phone">
                        <input type="text" name="sms_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric"
                          maxlength="1">
                        <input type="text" name="sms_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric"
                          maxlength="1">
                        <input type="text" name="sms_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric"
                          maxlength="1">
                        <input type="text" name="sms_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric"
                          maxlength="1">
                        <input type="text" name="sms_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric"
                          maxlength="1">
                        <input type="text" name="sms_verified_code[]" class="letter" pattern="[0-9]*" inputmode="numeric"
                          maxlength="1">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="btn-area  justify-content-center">
                    <button type="submit" class="btn-md cmn-btn w-100">@lang('Submit')</button>
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
@push('style')

  <style>
    #phoneInput .field-wrapper {
      position: relative;
      text-align: center;
    }

    #phoneInput .form-group {
      min-width: 300px;
      width: 50%;
      margin: 4em auto;
      display: flex;
      border: 1px solid rgba(96, 100, 104, 0.3);
    }

    #phoneInput .letter {
      height: 50px;
      border-radius: 0;
      border: none;
      text-align: center;
      max-width: calc((100% / 10) - 1px);
      flex-grow: 1;
      flex-shrink: 1;
      flex-basis: calc(100% / 10);
      outline-style: none;
      padding: 5px 0;
      font-size: 18px;
      font-weight: bold;
      color: red;
    }

    #phoneInput .letter+.letter {
      border-left: 1px solid #0e0d35;
    }

    @media (max-width: 480px) {
      #phoneInput .field-wrapper {
        width: 100%;
      }

      #phoneInput .letter {
        font-size: 16px;
        padding: 2px 0;
        height: 35px;
      }

      #phoneInput .letter {
        max-width: calc((100% / 7) - 1px);
      }
    }

  </style>
@endpush


@push('script-lib')
  <script src="{{ asset($activeTemplateTrue . 'js/jquery.inputLettering.js') }}"></script>
@endpush


@push('script')
  <script>
    $(function() {
      "use strict";
      $('#phoneInput').letteringInput({
        inputClass: 'letter',
        onLetterKeyup: function($item, event) {
          console.log('$item:', $item);
          console.log('event:', event);
        },
        onSet: function($el, event, value) {
          console.log('element:', $el);
          console.log('event:', event);
          console.log('value:', value);
        }
      });
    });
  </script>
@endpush
