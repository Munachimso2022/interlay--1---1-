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


            <div class="row justify-content-center mt-2">
              @foreach ($tools as $tool)
                <div class="col-md-4">
                  <div class="card">
                    <div class="thumb__350px">
                      <img src="{{ getImage(imagePath()['promotions']['path'] . '/' . @$tool->banner) }}">
                    </div>
                    <div class="referral-form mt-20">
                      @php
                        $string = '<a href="' . route('home') . '?reference=' . auth()->user()->username . '" target="_blank"> <img src="' . getImage(imagePath()['promotions']['path'] . '/' . @$tool->banner) . '" alt="image"/></a>';
                      @endphp

                      <div class="form-group p-3">
                        <textarea id="reflink{{ $tool->id }}" class="form-control" rows="5"
                          readonly>@php echo  $string @endphp</textarea>
                      </div>
                      <div class="px-3 pb-3 mt-3">
                        <button type="button" data-copytarget="#reflink{{ $tool->id }}"
                          class="btn copybtn btn-block btn-primary"><i class="icon ni ni-copy"></i>
                          &nbsp;
                          @lang('Copy')</button>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script>
    document.querySelectorAll('.copybtn').forEach((element) => {
      element.addEventListener('click', copy, true);
    })

    function copy(e) {
      var
        t = e.target,
        c = t.dataset.copytarget,
        inp = (c ? document.querySelector(c) : null);
      if (inp && inp.select) {
        inp.select();
        try {
          document.execCommand('copy');
          inp.blur();
          t.classList.add('copied');
          setTimeout(function() {
            t.classList.remove('copied');
          }, 1500);
        } catch (err) {
          alert(`@lang('Please press Ctrl/Cmd+C to copy')`);
        }
      }
    }
  </script>
@endpush
