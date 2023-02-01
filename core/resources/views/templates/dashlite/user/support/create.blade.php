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


            <div class="card card-bordered">

              <div class="card-header">
                <div class="col-md-12 mb-30">
                  <ul class="right">
                    <li>
                      <a href="{{ route('ticket') }}" class="btn float-right btn-dark" data-toggle="tooltip"
                        data-placement="top" title="@lang('My Support Ticket')">
                        <i class="fa fa-eye"></i> @lang('See All')
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card-body">
                <div class="row mb-60-80">
                  <div class="col-md-12 mb-30">
                    <form action="{{ route('ticket.store') }}" role="form" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row ">
                        <div class="form-group col-md-6">
                          <label for="name">@lang('Name')</label>
                          <input type="text" name="name" value="{{ $user->firstname . ' ' . $user->lastname }}"
                            class="form-control form-control-lg" placeholder="@lang('Enter Name')" required readonly>
                        </div>

                        <div class="form-group col-md-6">
                          <label for="email">@lang('Email address')</label>
                          <input type="email" name="email" value="{{ $user->email }}"
                            class="form-control form-control-lg" placeholder="@lang('Enter your Email')" required
                            readonly>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-12">
                          <label for="website">@lang('Subject')</label>
                          <input type="text" name="subject" value="{{ old('subject') }}"
                            class="form-control form-control-lg" placeholder="@lang('Subject')">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12 form-group">
                          <label for="inputMessage">@lang('Message')</label>
                          <textarea name="message" id="inputMessage" rows="12"
                            class="form-control">{{ old('message') }}</textarea>
                        </div>
                      </div>
                      <div class="row form-group">
                        <div class="col-sm-12">
                          <label for="inputAttachments">@lang('Attachments')</label>
                        </div>
                        <div class="col-9 file-upload">
                          <input type="file" name="attachments[]" id="inputAttachments" class="form-control" />
                          <div id="fileUploadsContainer"></div>
                        </div>
                        <div class="col-3">
                          <button type="button" class="btn btn-primary cmn-btn extraTicketAttachment">
                            <i class="icon ni ni-plus"></i>
                          </button>
                        </div>
                        <div class="col-sm-12 ticket-attachments-message text-muted">
                          @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx")
                        </div>
                      </div>
                      <div class="row form-group justify-content-center">
                        <div class="col-md-12">
                          <button class="btn cmn-btn btn-primary text-center mt-3" type="submit"
                            id="recaptcha">&nbsp;@lang('Submit Now')</button>
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


@push('script')
  <script>
    $('.extraTicketAttachment').click(function() {
      "use strict";
      $("#fileUploadsContainer").append(
        '<input type="file" name="attachments[]" class="form-control my-3" required />')
    });
  </script>
@endpush
