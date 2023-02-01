@extends($activeTemplate.'layouts.master')
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
                  <p>Choose a deposit method to add money.</p>
                </div>
              </div>
            </div>
          </div><!-- nk-block -->
          <div class="nk-block">

            <div class="plan-iv-list nk-slider nk-slider-s2">
              <ul class="plan-list slider-init"
                data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false, "responsive":[{"breakpoint": 992,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}} ]}'>


                @foreach ($gatewayCurrency as $data)
                  <li class="plan-item">
                    <div class="plan-item-card">
                      <div class="plan-item-head">
                        <div class="row justify-content-center mb-2">
                          <div class="col-6">
                            <img src="{{ $data->methodImage() }}" class="card-img-top w-100" alt="{{ $data->name }}">
                          </div>
                        </div>
                        <div class="plan-item-heading">
                          <h4 class="plan-item-title card-title title">{{ @$data->name }}</h4>
                        </div>
                      </div>

                      <div class="plan-item-body">
                        <div class="plan-item-desc card-text">
                          <ul class="plan-item-desc-list">

                            <li>
                              <span class="desc-label">@lang('Limit'):</span> <span
                                class="desc-data">{{ getAmount($data->min_amount) }} -
                                {{ getAmount($data->max_amount) }} {{ $general->cur_text }}</span>
                            </li>
                            <li>
                              <span class="desc-label">@lang('Charge'):</span> <span
                                class="desc-data">{{ getAmount($data->fixed_charge) }} {{ $general->cur_text }} +
                                {{ getAmount($data->percent_charge) }}%</span>
                            </li>


                            <div class="plan-item-action mt-3">
                              <label for="plan-iv-1" class="plan-label">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"
                                  data-resource="{{ $data }}"
                                  class="cmn-btn btn-md mt-4 deposit">@lang('Deposit')</a>
                              </label>
                            </div>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                @endforeach


              </ul>
            </div>


            <div class="plan-iv-actions text-center">
              <a href="{{ route('user.deposit.history') }}" class="btn btn-primary btn-lg"> <span>Deposit
                  History</span>
                <em class="icon ni ni-arrow-right"></em></a>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>









  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-bg">
        <div class="modal-header">
          <strong class="modal-title method-name text-white" id="exampleModalLabel"></strong>
          <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <form action="{{ route('user.deposit.insert') }}" method="post" class="register">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" name="currency" class="edit-currency" value="">
              <input type="hidden" name="method_code" class="edit-method-code" value="">
            </div>
            @if (session()->get('amount') != null)
              <input id="amount" type="hidden" class="form-control form-control-lg" name="amount" placeholder="0.00"
                required autocomplete="off" value="{{ decrypt(session()->get('amount')) }}">
              <h4 class="text-center">@lang('Please Confirm To Pay')</h4>
            @else
              <div class="form-group">
                <label>@lang('Enter Amount'):</label>
                <div class="input-group">
                  <input id="amount" type="text" class="form-control form-control-lg" name="amount" placeholder="0.00"
                    required autocomplete="off">
                  <div class="input-group-prepend">
                    <span class="input-group-text currency-addon addon-bg">{{ $general->cur_text }}</span>
                  </div>
                </div>
              </div>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">@lang('Close')</button>
            <button type="submit" class="btn-md cmn-btn">@lang('Next')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop



@push('script')
  <script>
    $(document).ready(function() {
      "use strict";
      $('.deposit').on('click', function() {
        var id = $(this).data('id');
        var result = $(this).data('resource');
        var minAmount = $(this).data('min_amount');
        var maxAmount = $(this).data('max_amount');
        var baseSymbol = "{{ $general->cur_text }}";
        var fixCharge = $(this).data('fix_charge');
        var percentCharge = $(this).data('percent_charge');

        var depositLimit = `@lang('Deposit Limit:') ${minAmount} - ${maxAmount}  ${baseSymbol}`;
        $('.depositLimit').text(depositLimit);
        var depositCharge =
          `@lang('Charge:') ${fixCharge} ${baseSymbol}  ${(0 < percentCharge) ? ' + ' +percentCharge + ' % ' : ''}`;
        $('.depositCharge').text(depositCharge);
        $('.method-name').text(`@lang('Payment By ') ${result.name}`);
        $('.currency-addon').text(baseSymbol);

        $('.edit-currency').val(result.currency);
        $('.edit-method-code').val(result.method_code);
      });
    });
  </script>
@endpush
