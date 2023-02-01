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
              </div>
            </div>
          </div><!-- nk-block -->
          <div class="nk-block">



            <div class="row dashboard-content">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="dashboard-inner-content">

                  <div class="row">


                    <div class="col-lg-6 col-md-6">
                      @if (Auth::user()->ts)
                        <div class="card">
                          <h5 class="card-header">@lang('Two Factor Authenticator')</h5>
                          <div class="card-body">
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" value="{{ $prevcode }}" class="form-control form-control-lg"
                                  id="referralURL" readonly>
                                <div class="input-group-append">
                                  <span class="input-group-text copytext copyBoard" id="copyBoard" onclick="myFunction()">
                                    <i class="fa fa-copy"></i> </span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group mx-auto text-center">
                              <img class="mx-auto" src="{{ $prevqr }}">
                            </div>

                            <div class="form-group mx-auto text-center">
                              <a href="#0" class="btn btn-block btn-lg btn-danger cmn-btn" data-toggle="modal"
                                data-target="#disableModal">@lang('Disable Two Factor Authenticator')</a>
                            </div>
                          </div>
                        </div>
                      @else
                        <div class="card card-bordered">

                          <h5 class="card-header">@lang('Two Factor Authenticator')</h5>
                          <div class="card-body">
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" name="key" value="{{ $secret }}"
                                  class="form-control form-control-lg" id="referralURL" readonly>
                                <div class="input-group-append">
                                  <span class="input-group-text copytext copyBoard" id="copyBoard" onclick="myFunction()">
                                    <i class="fa fa-copy"></i> </span>
                                </div>
                              </div>
                            </div>
                            <div class="form-group mx-auto text-center">
                              <img class="mx-auto" src="{{ $qrCodeUrl }}">
                            </div>
                            <div class="form-group mx-auto text-center">

                              <a href="#0" class="btn btn-lg mt-3 mb-1 cmn-btn btn-primary" data-toggle="modal"
                                data-target="#enableModal">@lang('Enable Two Factor Authenticator')</a>
                            </div>

                          </div>
                        </div>

                      @endif
                    </div>

                    <div class="col-lg-6 col-md-6">
                      <div class=" card card-bordered">
                        <h5 class="card-header">@lang('Google Authenticator')</h5>
                        <div class=" card-body">
                          <h5 class="text-uppercase">@lang('Use Google Authenticator to Scan the QR code or use the code')
                          </h5>
                          <hr />
                          <p>@lang('Google Authenticator is a multifactor app for mobile devices. It generates timed codes
                            used during the 2-step verification process. To use Google Authenticator, install the Google
                            Authenticator application on your mobile device.')</p>
                          <a class="btn btn-md mt-3 cmn-btn btn-primary"
                            href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"
                            target="_blank">@lang('DOWNLOAD APP')</a>
                        </div>
                      </div><!-- //. single service item -->
                    </div>

                  </div>
                </div>
              </div>
            </div>



            <!--Enable Modal -->
            <div id="enableModal" class="modal fade" role="dialog">
              <div class="modal-dialog ">
                <!-- Modal content-->
                <div class="modal-content modal-content-bg">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Verify your OTP')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form action="{{ route('user.twofactor.enable') }}" method="POST" class="register">
                    @csrf
                    <div class="modal-body ">
                      <div class="form-group">
                        <input type="hidden" name="key" value="{{ $secret }}">
                        <input type="text" class="form-control" name="code"
                          placeholder="@lang('Enter Google Authenticator Code')">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger action-btn" data-dismiss="modal">@lang('Close')</button>
                      <button type="submit" class="btn btn-primary action-btn">@lang('Verify')</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>

            <!--Disable Modal -->
            <div id="disableModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content modal-content-bg">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Verify your OTP disable')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <form action="{{ route('user.twofactor.disable') }}" method="POST" class="register">
                    @csrf
                    <div class="modal-body">
                      <div class="form-group">
                        <input type="text" class="form-control" name="code"
                          placeholder="@lang('Enter Google Authenticator Code')">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger action-btn" data-dismiss="modal">@lang('Close')</button>
                      <button type="submit" class="btn btn-primary action-btn">@lang('Verify')</button>
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

@endsection

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
