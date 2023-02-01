@extends($activeTemplate.'layouts.master')
@section('content')
  {{-- @include($activeTemplate.'partials.user-breadcrumb') --}}

  <div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
      <div class="nk-content-inner">
        <div class="nk-content-body">
          <div class="nk-block-head text-center">
            <div class="nk-block-head-content">
              <div class="nk-block-head-sub"></div>
              <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">{{ $page_title }}</h2>
                <div class="nk-block-des">
                  <p>@lang($page_title)</p>
                </div>
              </div>
            </div>
          </div><!-- nk-block -->

          <div class="nk-block">

            <div class="card card-bordered">
              <div class="table-responsive--md table-responsive">



                @for ($i = 1; $i <= $lev; $i++)
                  <div class="col-md-2 pb-3">
                    <a href="{{ route('user.referral.users', $i) }}"
                      class="cmn-btn btn-block mb-3 text-center">@lang('Level '.$i)</a>
                  </div>
                @endfor

                <table class="table style--two">
                  <thead>
                    <tr>
                      <th scope="col">@lang('SL')</th>
                      <th scope="col">@lang('Fullname')</th>
                      <th scope="col">@lang('Joined At')</th>
                    </tr>
                  </thead>
                  <tbody class="list">
                    {{ showUserLevel(auth()->user()->id, $lv_no) }}
                  </tbody>
                </table>




              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
