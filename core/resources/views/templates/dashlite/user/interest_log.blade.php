@extends($activeTemplate.'layouts.master')

@section('content')
  {{-- @include($activeTemplate.'partials.user-breadcrumb') --}}

  <script>
    "use strict"

    function createCountDown(elementId, sec) {
      var tms = sec;
      var x = setInterval(function() {
        var distance = tms * 1000;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes + "m " + seconds + "s ";
        if (distance < 0) {
          clearInterval(x);
          document.getElementById(elementId).innerHTML = "COMPLETE";
        }
        tms--;
      }, 1000);
    }
  </script>


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
                  <p>@lang($page_title).</p>
                </div>
              </div>
            </div>
          </div><!-- nk-block -->

          <div class="nk-block">

            <div class="card card-bordered">
              <div class="table-responsive--md table-responsive">


                <table class="table style--two">
                  <thead>
                    <tr>
                      <th scope="col">@lang('Plan')</th>
                      <th scope="col">@lang('Return')</th>
                      <th scope="col">@lang('Received')</th>
                      <th scope="col">@lang('Next payment')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($logs as $k=>$data)
                      <tr>
                        <td data-label="@lang('Plan')">{{ trans(optional($data->plan)->name) }} <br>
                          {{ getAmount($data->amount) }} {{ __($general->cur_text) }} </td>
                        <td data-label="@lang('Return')">
                          {{ getAmount($data->interest) }} {{ __($general->cur_text) }} every {{ $data->time_name }}
                          <br>
                          for
                          @if ($data->period == '-1')
                            @lang('Lifetime')
                          @else {{ $data->period }}
                            {{ $data->time_name }}
                          @endif

                          @if ($data->capital_status == '1') + @lang('Capital')
                          @endif

                        </td>
                        <td data-label="@lang('Received')"> {{ $data->return_rec_time }}x{{ $data->interest }} =
                          {{ $data->return_rec_time * $data->interest }} {{ __($general->cur_text) }} </td>

                        <td data-label="@lang('Next payment')" scope="row" class="font-weight-bold">
                          @if ($data->status == '1')
                            <p id="counter{{ $data->id }}" class="demo countdown timess2 "></p>

                            @php
                              if ($data->last_time) {
                                  $start = $data->last_time;
                              } else {
                                  $start = $data->created_at;
                              }
                            @endphp
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                style="width: {{ diffDatePercent($start, $data->next_time) }}" aria-valuenow="10"
                                aria-valuemin="0" aria-valuemax="100">
                              </div>
                            </div>

                          @else
                            <span class="badge badge-success">@lang('Completed')</span>
                          @endif
                        </td>


                        <script>
                          createCountDown('counter<?php echo $data->id; ?>', {{ \Carbon\Carbon::parse($data->next_time)->diffInSeconds() }});
                        </script>
                      </tr>

                    @empty
                      <tr>
                        <td colspan="8">{{ trans($empty_message) }}</td>
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
