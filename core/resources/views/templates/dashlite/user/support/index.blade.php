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
              <div class="col-md-12">
                <div class="right float-right my-4">
                  <a href="{{ route('ticket.open') }}" class="btn btn-primary cmn-btn">
                    <i class="fa fa-plus"></i> @lang('New Ticket')
                  </a>
                </div>
              </div>

              <div class="table-responsive--md table-responsive">
                <table class="table style--two">
                  <thead>
                    <tr>
                      <th scope="col" class="text-left">@lang('Subject')</th>
                      <th scope="col">@lang('Status')</th>
                      <th scope="col">@lang('Last Reply')</th>
                      <th scope="col">@lang('Action')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($supports as $key => $support)
                      <tr>
                        <td class="data-row text-left">
                          <a href="{{ route('ticket.view', $support->ticket) }}" class="text-white font-weight-bold">
                            [Ticket#{{ $support->ticket }}] {{ $support->subject }} </a>
                        </td>
                        <td data-label="@lang('Status')">
                          @if ($support->status == 0)
                            <span class="badge badge-primary py-1 px-2">@lang('Open')</span>
                          @elseif($support->status == 1)
                            <span class="badge badge-success py-1 px-2">@lang('Answered')</span>
                          @elseif($support->status == 2)
                            <span class="badge badge-warning py-1 px-2">@lang('Customer reply')</span>
                          @elseif($support->status == 3)
                            <span class="badge badge-dark py-1 px-2">@lang('Closed')</span>
                          @endif
                        </td>
                        <td data-label="@lang('Last reply')">{{ diffForHumans($support->last_reply) }} </td>

                        <td data-label="@lang('Action')">
                          <a href="{{ route('ticket.view', $support->ticket) }}" class="icon-btn base--bg text-dark">
                            <i class="fa fa-desktop"></i>
                          </a>
                        </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="4">{{ trans($empty_message) }}</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>

                {{ $supports->links() }}
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
