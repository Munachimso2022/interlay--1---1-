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
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>@lang('Enter Old Password')</label>
                        <input type="password" name="current_password" class="form-control form-control-lg">
                      </div>
                      <div class="form-group">
                        <label>@lang('Enter New Password')</label>
                        <input type="password" name="password" class="form-control form-control-lg">
                      </div>
                      <div class="form-group">
                        <label>@lang('Re-type Password')</label>
                        <input type="password" name="password_confirmation" class="form-control form-control-lg">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-lg btn-primary cmn-btn">@lang('Update')</button>
                </div>
              </form>
            </div>





          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


@push('script')

@endpush
