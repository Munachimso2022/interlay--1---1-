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

                <div class="col-md-12">
                  <div class="right float-right mb-5">
                    <a href="@if (request()->routeIs('user.transactions.deposit')) javascript:void(0) @else {{ route('user.transactions.deposit') }} @endif"
                      class="btn cmn-btn mb-md-0 mb-3 btn-primary @if (request()->routeIs('user.transactions.deposit')) btn-disabled @endif">
                        @lang('Deposit Wallet Transactions')
                    </a>
                    <a href="@if (request()->routeIs('user.transactions.interest')) javascript:void(0) @else {{ route('user.transactions.interest') }} @endif"
                      class="btn cmn-btn mb-md-0 btn-secondary @if (request()->routeIs('user.transactions.interest')) btn-disabled @endif">
                        @lang('Interest Wallet Transactions')
                    </a>
                  </div>
                </div>



                <table class="table style--two">
                  <thead>
                    <tr>
                      <th scope="col">@lang('Date')</th>
                      <th scope="col">@lang('Trx')</th>
                      <th scope="col">@lang('Details')</th>
                      <th scope="col">@lang('Amount')</th>
                      <th scope="col">@lang('Remaining balance')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($logs as $k=>$data)
                      <tr>
                        <td data-label="@lang('Date')">
                          {{ showDateTime($data->created_at) }}
                        </td>
                        <td data-label="#@lang('Trx')">{{ $data->trx }}</td>
                        <td data-label="@lang('Details')">{{ $data->details }}</td>
                        <td data-label="@lang('Amount')">
                          <strong @if ($data->trx_type == '+') class="text-success" @else class="text-danger" @endif>
                            {{ $data->trx_type == '+' ? '+' : '-' }} {{ getAmount($data->amount) }}
                            {{ $general->cur_text }}</strong>
                        </td>
                        <td data-label="@lang('Remaining balance')">
                          <strong>{{ getAmount($data->post_balance) }} {{ $general->cur_text }}</strong>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="5">{{ __($empty_message) }}</td>
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


@push('script')

@endpush
