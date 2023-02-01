@extends($activeTemplate.'layouts.master')

@section('content')

  {{-- @include($activeTemplate.'partials.user-breadcrumb') --}}
  <div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
      <div class="nk-content-inner">
        <div class="nk-content-body">
          <div class="nk-block-head text-center">
            <div class="nk-block-head-content">
              <div class="nk-block-head-content">
                <h2 class="nk-block-title fw-normal">@lang($page_title)</h2>
                <div class="nk-block-des">
                  <p>Complete your deposit process below.</p>
                </div>
              </div>
            </div>
          </div><!-- nk-block -->
          <div class="nk-block">


            <div class="row mb-60-80 justify-content-center">
              <div class="col-md-8">
                <div class="card card-bordered">
                  <div class="card-body  ">
                    <form action="{{ route('user.deposit.manual.update') }}" method="POST"
                      enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        @php
                          $extra = $data->gateway->extra;
                        @endphp

                        <div class="col-md-12 text-center">
                          <p class="text-center mt-2">@lang('Your order to deposit') <b
                              class="text-success">{{ getAmount($data['amount']) }} is created.
                            <b
                              class="text-success">{{ getAmount($data['final_amo']) . ' ' . $data['method_currency'] }}</b>
                            @lang(' for successful payment')
                          </p>
                          <h6 class="text-center mb-4">@lang('Kindly copy the wallet address below and make payment,Upload proof of payment for easier validation')</h6>
                          
                          <div class="nk-refwg-url">
                    <div class="form-control-wrap">
                      <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied"
                        data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span
                          class="clipboard-text">Copy Link</span></div>
                      <div class="form-icon">
                        {{--<em class="icon ni ni-link-alt"></em>--}}
                      </div>
                      <input type="text" class="form-control copy-text" id="refUrl"
                        value="{{$data->gateway->description}}">
                    </div>
                  </div><br>
                          
                          
                          

                        {{--  <p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>--}}

                        </div>

                        @if ($method->gateway_parameter)

                          @foreach (json_decode($method->gateway_parameter) as $k => $v)

                            @if ($v->type == 'text')
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label><strong>{{ __(inputTitle($v->field_level)) }} @if ($v->validation == 'required') <span class="text-danger">*</span>
                                      @endif</strong></label>
                                  <input type="text" class="form-control form-control-lg" name="{{ $k }}"
                                    value="{{ old($k) }}" placeholder="{{ __($v->field_level) }}">
                                </div>
                              </div>
                            @elseif($v->type == "textarea")
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label><strong>{{ __(inputTitle($v->field_level)) }} @if ($v->validation == 'required') <span class="text-danger">*</span>
                                      @endif</strong></label>
                                  <textarea name="{{ $k }}" class="form-control"
                                    placeholder="{{ __($v->field_level) }}" rows="3">{{ old($k) }}</textarea>

                                </div>
                              </div>
                            @elseif($v->type == "file")
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label><strong>{{ __($v->field_level) }} @if ($v->validation == 'required') <span class="text-danger">*</span>
                                      @endif</strong></label>
                                  <br>

                                  <div class="fileinput fileinput-new " data-provides="fileinput">
                                    <div class="fileinput-new thumbnail withdraw-thumbnail" data-trigger="fileinput">
                                      <img src="{{ asset(imagePath()['image']['default']) }}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail wh-200-150"></div>

                                    <div class="img-input-div my-3">
                                      <span class="btn-file">
                                        <span class="fileinput-new "> @lang('Select') {{ $v->field_level }}</span>
                                        {{-- <span class="fileinput-exists"> @lang('Change')</span> --}}
                                        <input type="file" name="{{ $k }}" accept="image/*">
                                      </span>
                                      
                                      <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">
                                        @lang('Remove')</a>
                                    </div>

                                  </div>



                                </div>
                              </div>
                            @endif

                          @endforeach

                        @endif


                        <div class="col-md-12">
                          <div class="form-group">
                            <button type="submit" class="btn cmn-btn btn-block mt-2 text-center btn-primary">@lang('Pay
                              Now')</button>
                          </div>
                        </div>

                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>




          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('style-lib')
  <link rel="stylesheet" href="{{ asset($activeTemplateTrue . '/css/bootstrap-fileinput.css') }}">
@endpush
@push('style')
  <style type="text/css">
    .withdraw-thumbnail {
      max-width: 220px;
      max-height: 220px
    }

  </style>
@endpush
@push('script-lib')
  <script src="{{ asset($activeTemplateTrue . '/js/bootstrap-fileinput.js') }}"></script>
@endpush
@push('script')
  <script>
    $('.copyBoard').click(function() {
      "use strict";
      var copyText = document.getElementById("referralURL");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      /*For mobile devices*/
      document.execCommand("copy");
      iziToast.success({
        message: "Copied: " + copyText.value,
        position: "topRight"
      });
    });
  </script>
@endpush
