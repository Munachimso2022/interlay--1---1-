<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('partials.seo')

  {{-- DAHSHLITE CSS --}}
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/dashlite.css') }}">
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/theme.css') }}">
  {{-- DAHSHLITE CSS --}}


  @stack('style')
</head>

<body class="nk-body npc-invest bg-lighter no-touch nk-nio-theme  as-mobile">
  <div class="nk-app-root">
    @php echo  fbComment() @endphp


    @yield('content')

    @stack('renderModal')


    <!-- footer section start -->
    @php
      $links = getContent('links.element', '', '', 1);
      //   $footer = getContent('footer.content', true);
      //   $socials = getContent('social_icon.element', '', '', 1);
    @endphp
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
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->


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


</body>

</html>
