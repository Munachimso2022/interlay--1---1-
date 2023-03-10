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
                <h2 class="nk-block-title fw-normal">
                  {{ __($page_title) }}</h2>
                <div class="nk-block-des">
                  <p>@lang($page_title)</p>
                </div>
              </div>
            </div>
          </div><!-- nk-block -->

          <div class="nk-block">

            <div class="card card-bordered">
              <div class="table-responsive--md table-responsive">



                <div class="right float-md-right float-none text-md-right text-center my-5">
                <a href="@if (request()->routeIs('user.referral.commissions.deposit')) javascript:void(0) @else
                    {{ route('user.referral.commissions.deposit') }} @endif" class="btn cmn-btn mb-md-0
                    btn-primary
                    mb-2 @if (request()->routeIs('user.referral.commissions.deposit'))
                      btn-disabled @endif">
                      @lang('Deposit Commission')
                  </a>
                  <a href="@if (request()->routeIs('user.referral.commissions.interest')) javascript:void(0) @else {{ route('user.referral.commissions.interest') }} @endif" class="btn cmn-btn mb-md-0 mb-2
                    @if (request()->routeIs('user.referral.commissions.interest'))
                      btn-disabled @endif btn-secondary">
                      @lang('Interest Commission')
                  </a>
                  <a href="@if (request()->routeIs('user.referral.commissions.invest')) javascript:void(0) @else {{ route('user.referral.commissions.invest') }} @endif " class="btn cmn-btn mb-md-0
                    @if (request()->routeIs('user.referral.commissions.invest'))
                      btn-disabled
                      @endif btn-warning">
                      @lang('Invest Commission')
                  </a>
                </div>
              </div>


              <table class="table style--two">
                <thead>
                  <tr>
                    <th scope="col">@lang('Date')</th>
                    <th scope="col">@lang('From')</th>
                    <th scope="col">@lang('Level')</th>
                    <th scope="col">@lang('Percent')</th>
                    <th scope="col">@lang('Amount')</th>
                    <th scope="col">@lang('Type')</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($logs as $data)
                    <tr @if ($data->amount < 0) class="halka-golapi" @endif>
                      <td data-label="@lang('Date')">{{ showDateTime($data->created_at, 'd M, Y') }}</td>
                      <td data-label="@lang('From')"><strong>{{ @$data->bywho->username }}</strong></td>
                      <td data-label="@lang('Level')">{{ __(ordinal($data->level)) }} @lang('Level')</td>
                      <td data-label="@lang('Percent')">{{ getAmount($data->percent) }} %</td>
                      <td data-label="@lang('Amount')">{{ __($general->cur_sym) }}
                        {{ getAmount($data->commission_amount) }}
                      </td>
                      <td data-label="@lang('Type')">{{ __($data->type) }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td class="text-right" colspan="100%">{{ __($empty_message) }}</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
              {{ $logs->links() }}





            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
@endsection
