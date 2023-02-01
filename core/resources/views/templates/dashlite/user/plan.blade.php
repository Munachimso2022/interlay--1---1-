@extends($extend_blade)
@section('content')
  {{-- @include($activeTemplate.'partials.user-breadcrumb') --}}
  <div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
      <div class="nk-content-inner">
        <div class="nk-content-body">
          <div class="nk-block-head text-center">
            <div class="nk-block-head-content">
              <div class="nk-block-head-sub"><span>Choose an Option</span></div>
              <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">@lang($page_title)</h2>
                <div class="nk-block-des">
                  <p>Choose your investment plan and start earning.</p>
                </div>
              </div>
            </div>
          </div><!-- nk-block -->
          <div class="nk-block">

            <div class="plan-iv-list nk-slider nk-slider-s2">
              <ul class="plan-list slider-init"
                data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false, "responsive":[{"breakpoint": 992,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}} ]}'>

                @foreach ($plans as $k => $data)
                  @php
                    $time_name = \App\Models\TimeSetting::where('time', $data->times)->first();
                  @endphp
                  <li class="plan-item">
                    <input type="radio" id="plan-iv-{{ $k }}" name="plan-iv" class="plan-control">
                    <div class="plan-item-card">
                      <div class="plan-item-head">
                        <div class="plan-item-heading">
                          <h4 class="plan-item-title card-title title">{{ @$data->name }}</h4>
                          {{-- <p class="sub-text">Enjoy entry level of invest & earn money.</p> --}}
                        </div>
                        <div class="plan-item-summary card-text">
                          <div class="row">
                            <div class="col-6">
                              <span
                                class="lead-text">{{ __($data->interest) }}{{ $data->interest_status == 1 ? '%' : __($general->cur_text) }}</span>
                              <span class="sub-text">@lang('Every') {{ __($time_name->name) }}</span>
                            </div>
                            <div class="col-6">
                              @if ($data->lifetime_status == 0)
                                <span class="lead-text">{{ __($data->repeat_time) }}</span>
                                <span class="sub-text">{{ __($time_name->name) }}(s)</span>
                              @else
                                <span class="lead-text"> @lang('Lifetime') </span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="plan-item-body">
                        <div class="plan-item-desc card-text">
                          <ul class="plan-item-desc-list">

                            @if ($data->fixed_amount == 0)
                              <li><span class="desc-label">Min Deposit</span> - <span
                                  class="desc-data">{{ __($general->cur_sym) }}{{ number_format($data->minimum) }}</span>
                              </li>
                              <li><span class="desc-label">Max Deposit</span> - <span
                                  class="desc-data">{{ __($general->cur_sym) }}{{ number_format($data->maximum) }}</span>
                              </li>
                            @else
                              <li><span class="desc-label">Fixed Deposit</span> - <span
                                  class="desc-data">{{ __($general->cur_sym) }}{{ number_format($data->maximum) }}</span>
                              </li>
                            @endif
                            <li><span class="desc-label">Capital Return</span> - <span class="desc-data">
                              @if ($data->capital_back_status == 0) Yes @else No
                                @endif
                              </span></li>

                            <li><span class="desc-label">Total Return</span> - <span
                                class="desc-data">{{ __($data->interest * $data->repeat_time) }}{{ $data->interest_status == 1 ? '%' : __($general->cur_text) }}</span>
                            </li>
                          </ul>

                          <div class="plan-item-action">
                            <label for="plan-iv-{{ $k }}" class="plan-label">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#depoModal"
                                data-resource="{{ $data }}"
                                class="cmn-btn btn-md mt-4 investButton">@lang('Choose this plan')</a>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li><!-- .plan-item -->

                @endforeach

              </ul><!-- .plan-list -->
            </div>
            <div class="plan-iv-actions text-center">
              <a href="{{ route('user.interest.log') }}" class="btn btn-primary btn-lg"> <span>My Investments</span>
                <em class="icon ni ni-arrow-right"></em></a>
            </div>
          </div><!-- nk-block -->
        </div>
      </div>
    </div>
  </div>





  {{-- <section class="pt-60 pb-120">
    <div class="container">
      <div class="row mb-none-30 justify-content-center">
        <div class="col-md-12">
          <div class="right float-right mb-5">
            <a href="{{ route('user.interest.log') }}" class="btn cmn-btn">
              @lang('My Investments')
            </a>
          </div>
        </div>
        @foreach ($plans as $k => $data)
          @php
            $time_name = \App\Models\TimeSetting::where('time', $data->times)->first();
          @endphp
          <div class="col-lg-3 mb-30">
            <div class="package-card text-center bg_img"
              data-background="{{ asset($activeTemplateTrue . '/images/bg/bg-4.png') }}">
              <h4 class="package-card__title base--color mb-2">{{ @$data->name }}</h4>

              <ul class="package-card__features mt-4">
                <li>@lang('Return')
                  {{ __($data->interest) }}{{ $data->interest_status == 1 ? '%' : __($general->cur_text) }}</li>

                <li>
                  @lang('Every') {{ __($time_name->name) }}
                </li>
                <li>@lang('For') @if ($data->lifetime_status == 0)
                  {{ __($data->repeat_time) }} {{ __($time_name->name) }} @else @lang('Lifetime') @endif
                </li>
                <li>
                  @if ($data->lifetime_status == 0)
                    @lang('Total')
                    {{ __($data->interest * $data->repeat_time) }}{{ $data->interest_status == 1 ? '%' : __($general->cur_text) }}

                    @if ($data->capital_back_status == 1)
                      + <span class="badge badge-success">@lang('Capital')</span>
                    @endif
                  @else
                    @lang('Lifetime Earning')
                  @endif
                </li>
              </ul>
              <div class="package-card__range mt-5 base--color">
                @if ($data->fixed_amount == 0)
                  {{ __($general->cur_sym) }}{{ __($data->minimum) }} -
                  {{ __($general->cur_sym) }}{{ __($data->maximum) }}
                @else
                  {{ __($general->cur_sym) }}{{ __($data->maximum) }}
                @endif
              </div>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#depoModal"
                data-resource="{{ $data }}" class="cmn-btn btn-md mt-4 investButton">@lang('Invest Now')</a>
            </div><!-- package-card end -->
          </div>
        @endforeach
      </div>
    </div>
  </section> --}}



  @push('renderModal')

    <!-- Modal -->
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">

      <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <strong class="modal-title text-white" id="ModalLabel">
              @guest
                @lang('At first sign in your account')
              @else
                @lang('Confirm to invest on') <span class="planName"></span>
              @endguest
            </strong>
            <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form action="{{ route('user.buy.plan') }}" method="post" class="register">
            @csrf
            @auth
              <div class="modal-body">

                <div class="form-group">
                  <h6 class="text-center investAmountRenge"></h6>

                  <p class="text-center mt-1 interestDetails"></p>
                  <p class="text-center interestValidaty"></p>

                  <div class="form-group ">
                    <strong class="text-white mb-2 d-block">@lang('Select wallet')</strong>
                    <select class="form-control" name="wallet_type">
                      <option value="deposit_wallet">@lang('Deposit Wallet -
                        '.$general->cur_sym.getAmount(auth()->user()->deposit_wallet))</option>
                      <option value="interest_wallet">@lang('Interest Wallet
                        -'.$general->cur_sym.getAmount(auth()->user()->interest_wallet))</option>
                      <option value="checkout">@lang('Checkout')</option>
                    </select>
                  </div>
                  <input type="hidden" name="plan_id" class="plan_id">

                  <div class="form-group">
                    <strong class="text-white mb-2 d-block">@lang('Invest Amount')</strong>
                    <input type="text" class="form-control fixedAmount" id="fixedAmount" name="amount"
                      value="{{ old('amount') }}" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                      autocomplete="off">
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('No')</button>
                <button type="submit" class="btn cmn-btn btn-primary">@lang('Yes')</button>
              </div>
            @endauth

            @guest
              <div class="modal-footer">
                <a href="{{ route('user.login') }}" type="button" class="cmn-btn btn-md w-100 text-center">@lang('At first
                  sign in your account')</a>
              </div>
            @endguest
          </form>
        </div>
      </div>
    </div>
  @endpush
@endsection


@push('script')
  <script>
    (function($) {
      "use strict";
      $(document).on('click', '.investButton', function() {
        var data = $(this).data('resource');
        var symbol = "{{ __($general->cur_sym) }}";
        var currency = "{{ __($general->cur_text) }}";

        $('#mySelect').empty();

        if (data.fixed_amount == '0') {
          $('.investAmountRenge').text(`@lang('invest'): ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
          $('.fixedAmount').val('');
          $('#fixedAmount').attr('readonly', false);


        } else {
          $('.investAmountRenge').text(`@lang('invest'): ${symbol}${data.fixed_amount}`);
          $('.fixedAmount').val(data.fixed_amount);
          $('#fixedAmount').attr('readonly', true);

        }

        if (data.interest_status == '1') {
          $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} % </strong>`);
        } else {
          $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} ${currency}  </strong>`);
        }
        if (data.lifetime_status == '0') {
          $('.interestValidaty').html(
            `<strong>  @lang('per') ${data.times} @lang('hours') ,  ${data.repeat_time} @lang('times')</strong>`);
        } else {
          $('.interestValidaty').html(
            `<strong>  @lang('per') ${data.times} @lang('hours'),  @lang('life time') </strong>`);
        }

        $('.planName').text(data.name);
        $('.plan_id').val(data.id);
      });



    })(jQuery);
  </script>
@endpush
