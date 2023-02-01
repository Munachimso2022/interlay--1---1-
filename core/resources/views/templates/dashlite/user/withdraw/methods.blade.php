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
                  <p>Choose a withdrawal method.</p>
                </div>
              </div>
            </div>
          </div><!-- nk-block -->
          <div class="nk-block">

            <div class="plan-iv-list nk-slider nk-slider-s2">
              <ul class="plan-list slider-init"
                data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false, "responsive":[{"breakpoint": 992,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}} ]}'>


                @foreach ($withdrawMethod as $data)
                  <li class="plan-item">
                    <div class="plan-item-card">
                      <div class="plan-item-head">
                        <div class="row justify-content-center mb-2">
                          <div class="col-6">
                            <img src="{{ getImage(imagePath()['withdraw']['method']['path'] . '/' . $data->image) }}"
                              class="card-img-top w-100" alt="{{ $data->name }}">
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
                                class="desc-data">{{ getAmount($data->min_limit) }} -
                                {{ getAmount($data->max_limit) }} {{ $general->cur_text }}</span>
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
                                  class="cmn-btn btn-md mt-4 deposit">@lang('Withdraw')</a>
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
              <a href="{{ route('user.withdraw.history') }}" class="btn btn-primary btn-lg"> <span>Withdrawal
                  History</span>
                <em class="icon ni ni-arrow-right"></em></a>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>




  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content modal-content-bg">
        <div class="modal-header">
          <h5 class="modal-title method-name" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('user.withdraw.money') }}" method="post" class="register">
          @csrf
          <div class="modal-body">
            <p class="text-info depositLimit"></p>
            <p class="text-info depositCharge"></p>

            <div class="form-group">
              <input type="hidden" name="currency" class="edit-currency form-control" value="">
              <input type="hidden" name="method_code" class="edit-method-code  form-control" value="">
            </div>



            <div class="form-group">
              <label>@lang('Enter Amount'):</label>
              <div class="input-group">
                <input id="amount" type="text" class="form-control form-control-lg"
                  onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00"
                  required="" value="{{ old('amount') }}">

                <div class="input-group-prepend">
                  <span class="input-group-text addon-bg currency-addon">{{ __($general->cur_text) }}</span>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
            <button type="submit" class="btn cmn-btn btn-primary">@lang('Confirm')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script>
    (function($) {
      "use strict";
      $(document).ready(function() {
        $('.deposit').on('click', function() {
          var result = $(this).data('resource');

          $('.method-name').text(`@lang('Withdraw Via ') ${result.name}`);


          $('.edit-method-code').val(result.id);
        });
      });
    })(jQuery);
  </script>
@endpush
