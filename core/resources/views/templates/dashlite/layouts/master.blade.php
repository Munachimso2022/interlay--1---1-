<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('partials.seo')
  <!-- bootstrap 4  -->

  @stack('style-lib')

  {{-- DAHSHLITE CSS --}}
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/dashlite.css?ver=2.4.0') }}">
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/theme.css?ver=2.4.0') }}">
  {{-- DAHSHLITE CSS --}}

  @stack('style')
</head>

<body class="nk-body npc-invest bg-lighter no-touch nk-nio-theme  as-mobile">
  <div class="nk-app-root">
    @php echo  fbComment() @endphp
    <!-- wrap @s -->
    <div class="nk-wrap ">
      <div class="nk-header nk-header-fluid is-theme">
        <div class="container-xl wide-xl">
          <div class="nk-header-wrap">
            <div class="nk-menu-trigger mr-sm-2 d-lg-none">
              <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                  class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand">
              <a href="{{ route('home') }}" class="logo-link">
                <img class="logo-light logo-img" src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}"
                  srcset="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}"
                  srcset="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }} 2x" alt="logo-dark">
              </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-menu" data-content="headerNav">
              <div class="nk-header-mobile">
                <div class="nk-header-brand">
                  <a href="{{ route('home') }}" class="logo-link">
                    <img class="logo-light logo-img"
                      src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}"
                      srcset="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }} 2x" alt="logo">
                    <img class="logo-dark logo-img"
                      src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}"
                      srcset="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }} 2x" alt="logo-dark">
                  </a>
                </div>
                <div class="nk-menu-trigger mr-n2">
                  <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                      class="icon ni ni-arrow-left"></em></a>
                </div>
              </div>
              <ul class="nk-menu nk-menu-main ui-s2">
                <li class="nk-menu-item">
                  <a href="{{ route('user.home') }}" class="nk-menu-link">
                    <span class="nk-menu-text">@lang('Dashboard')</span>
                  </a>
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item">
                  <a href="{{ route('user.plan') }}" class="nk-menu-link">
                    <span class="nk-menu-text">@lang('Investment')</span>
                  </a>
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item">
                  <a href="{{ route('user.withdraw') }}" class="nk-menu-link">
                    <span class="nk-menu-text">@lang('Withdraw')</span>
                  </a>
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item">
                  <a href="{{ route('user.deposit') }}" class="nk-menu-link">
                    <span class="nk-menu-text">@lang('Deposit')</span>
                  </a>
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item">
                  <a href="{{ route('user.transactions.deposit') }}" class="nk-menu-link">
                    <span class="nk-menu-text">@lang('Transactions')</span>
                  </a>
                </li><!-- .nk-menu-item -->
                <li class="nk-menu-item has-sub">
                  <a href="#" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-text">Referrals</span>
                  </a>
                  <ul class="nk-menu-sub">
                    <li class="nk-menu-item">
                      <a href="{{ route('user.referral.users') }}" class="nk-menu-link"><span
                          class="nk-menu-text">@lang('Referred Users')</span></a>
                    </li>
                    <li class="nk-menu-item">
                      <a href="{{ route('user.referral.commissions.deposit') }}" class="nk-menu-link"><span
                          class="nk-menu-text">@lang('Referral Commisions')</span></a>
                    </li>
                  </ul><!-- .nk-menu-sub -->
                </li><!-- .nk-menu-item -->
<li class="nk-menu-item">
              <div id="google_translate_element"></div>
              </li>

              </ul><!-- .nk-menu -->
              
            </div><!-- .nk-header-menu -->
            <div class="nk-header-tools">
              <ul class="nk-quick-nav">
                <li class="dropdown user-dropdown order-sm-first">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="user-toggle">
                      <div class="user-avatar sm">
                        <em class="icon ni ni-user-alt"></em>
                      </div>
                      <div class="user-info d-none d-xl-block">
                        {{-- <div class="user-status">Administrator</div> --}}
                        <div class="user-name dropdown-indicator">{{ Auth::user()->fullname }}
                        </div>
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                      <div class="user-card">
                        <div class="user-avatar">
                          <span>AB</span>
                        </div>
                        <div class="user-info">
                          <span class="lead-text">{{ Auth::user()->fullname }}</span>
                          <span class="sub-text">{{ Auth::user()->email }}</span>
                        </div>
                        <div class="user-action">
                          <a class="btn btn-icon mr-n2" href="{{ route('user.profile-setting') }}"><em
                              class="icon ni ni-setting"></em></a>
                        </div>
                      </div>
                    </div>
                    <div class="dropdown-inner user-account-info">
                      <h6 class="overline-title-alt">Interest Balance</h6>
                      <div class="user-balance">{{ number_format(Auth::user()->interest_wallet, 2) }} <small
                          class="currency currency-usd">{{ $general->cur_text }}</small></div>
                      <div class="user-balance-sub">
                        Locked <span>{{ number_format(Auth::user()->deposit_wallet, 2) }}
                          <span class="currency currency-usd">{{ $general->cur_text }}</span></span>
                      </div>
                      <a href="{{ route('user.withdraw') }}" class="link">
                        <span>Withdraw Balance</span> <em class="icon ni ni-wallet-out"></em>
                      </a>
                    </div>
                    <div class="dropdown-inner">
                      <ul class="link-list">

                        <li>
                          <a href="{{ route('user.profile-setting') }}">
                            <em class="icon ni ni-user-alt"></em>@lang('Profile Setting')
                          </a>
                        </li>
                        @if ($general->b_transfer)
                          <li>
                            <a href="{{ route('user.transfer.balance') }}">
                              <em class="icon ni ni-exchange"></em>@lang('Transfer Balance')
                            </a>
                          </li>
                        @endif
                        <li>
                          <a href="{{ route('user.change-password') }}">
                            <em class="icon ni ni-lock"></em>@lang('Change Password')
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('ticket') }}">
                            <em class="icon ni ni-info"></em>@lang('Support Ticket')
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('user.promotions.tool') }}">
                            <em class="icon ni ni-gift"></em>@lang('Promotional Tool')
                          </a>
                        </li>
                        <li>
                          <a href="{{ route('user.twofactor') }}">
                            <em class="icon ni ni-lock"></em>@lang('2FA Security')
                          </a>
                        </li>

                        <li>
                          <a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                        </li>
                      </ul>
                    </div>
                    <div class="dropdown-inner">
                      <ul class="link-list">
                        <li>
                          <a href="{{ route('user.logout') }}">
                            <em class="icon ni ni-signout"></em><span>{{ __('Sign Out') }}</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li><!-- .dropdown -->
              </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
          </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
      </div>
      <!-- main header @e -->





      @yield('content')

      @stack('renderModal')


      @php
        $links = getContent('links.element', '', '', 1);
        // $footer = getContent('footer.content', true);
        // $socials = getContent('social_icon.element', '', '', 1);
      @endphp

      <!-- footer @s -->
      <div class="nk-footer nk-footer-fluid bg-lighter">
        <div class="container-xl wide-lg">
          <div class="nk-footer-wrap">
            <div class="nk-footer-copyright">
              @lang('© '.date('2016').' <a href="'.route('home').'">'.$general->sitename.'</a>. All rights reserved')
            </div>
            <div class="nk-footer-links">
              <ul class="nav nav-sm">

                @foreach ($links as $link)
                  <li class="nav-item"><a class="nav-link"style="color:#fcae04"
                      href="{{ route('linkDetails', [slug($link->data_values->title), $link->id]) }}">
                      @lang($link->data_values->title)
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- footer @e -->
    </div> <!-- page-wrapper end -->
  </div>
  


  {{-- <!-- jQuery library -->
  <script src="{{ asset($activeTemplateTrue . '/js/vendor/jquery-3.5.1.min.js') }}"></script>
  <!-- bootstrap js -->
  <script src="{{ asset($activeTemplateTrue . '/js/vendor/bootstrap.bundle.min.js') }}"></script>

  @stack('script-lib')
  <!-- slick slider js -->
  <script src="{{ asset($activeTemplateTrue . '/js/vendor/slick.min.js') }}"></script>
  <script src="{{ asset($activeTemplateTrue . '/js/vendor/wow.min.js') }}"></script>
  <!-- dashboard custom js -->
  <script src="{{ asset($activeTemplateTrue . '/js/app.js') }}"></script> --}}

  <script src="{{ asset($activeTemplateTrue . '/js/bundle.js?ver=2.4.0') }}"></script>
  <script src="{{ asset($activeTemplateTrue . '/js/scripts.js?ver=2.4.0') }}"></script>
  <script src="{{ asset($activeTemplateTrue . '/js/charts/chart-invest.js?ver=2.4.0') }}"></script>


  @include($activeTemplate.'partials.notify')


  @include('partials.plugins')

  @stack('script')
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script>
    (function() {
      "use strict";
      $(document).on("change", ".langSel", function() {
        window.location.href = "{{ url('/') }}/change/" + $(this).val();
      });
    })();
  </script>


</body>

</html>
