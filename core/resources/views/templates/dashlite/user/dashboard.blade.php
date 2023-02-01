@extends($activeTemplate.'layouts.master')
@section('content')
  {{-- @include($activeTemplate.'partials.user-breadcrumb') --}}
<style>
    .c{color:#251144;}
</style>

  <div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
      <div class="nk-content-inner">
        <div class="nk-content-body">
          <div class="nk-block-head">
            <div class="nk-block-between-md g-3">
              <div class="nk-block-head-content">
                <div class="nk-block-head-sub"><span>Welcome!</span></div>
                <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                  <div>
                    <h2 class="nk-block-title fw-normal">{{ $user->fullname }}</h2>
                  </div>
                  <div><a href="{{ route('user.plan') }}" class="btn btn-white  c">Investment Plans <em
                        class="icon ni ni-arrow-long-right ml-2"></em></a></div>
                </div>
                <div class="nk-block-des">
                  <p>At a glance summary of your investment account.Have fun!</p>
                  @if ($user->kyc_verified) 
                  <p>[ <span class="badge badge-pill badge-info">{{ strtoupper('Verified') }}</span> ] - Kyc Verification completed</p>
                  @else
                  <p>[ <span class="badge badge-pill badge-danger">{{ strtoupper('unverified') }}</span> ] - Please provide your kyc to verify your account, <a href="/user/profile-setting">click</a> to continue.</p>
                  @endif
                </div>
              </div><!-- .nk-block-head-content -->

            </div><!-- .nk-block-head -->
          </div>


          <div class="nk-block">
            <div class="row gy-gs">
                
              <div class="col-md-6 col-lg-4">
                  
                <div class="nk-wg-card is-dark card card-bordered">
                  <div class="card-inner">
                    <div class="nk-iv-wg2">
                      <div class="nk-iv-wg2-title">
                        <h6 class="title ">@lang('Deposit Wallet Balance') <em class="icon ni ni-info"></em></h6>
                      </div>
                      <div class="nk-iv-wg2-text">
                        <div class="nk-iv-wg2-amount  "> {{ $general->cur_sym }}{{ getAmount($user->deposit_wallet) }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- .card -->
              </div><!-- .col -->
              <div class="col-md-6 col-lg-4">
                <div class="nk-wg-card is-s1 card card-bordered">
                  <div class="card-inner">
                    <div class="nk-iv-wg2">
                      <div class="nk-iv-wg2-title">
                        <h6 class="title">@lang('Interest Wallet Balance') <em class="icon ni ni-info"></em></h6>
                      </div>
                      <div class="nk-iv-wg2-text">
                        <div class="nk-iv-wg2-amount c "> {{ $general->cur_sym }}{{ getAmount($user->interest_wallet) }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- .card -->
              </div><!-- .col -->
              <div class="col-md-12 col-lg-4">
                <div class="nk-wg-card is-s3 card card-bordered">
                  <div class="card-inner">
                    <div class="nk-iv-wg2">
                      <div class="nk-iv-wg2-title">
                        <h6 class="title">@lang('Total Deposit') <em class="icon ni ni-info"></em></h6>
                      </div>
                      <div class="nk-iv-wg2-text">
                        <div class="nk-iv-wg2-amount c ">
                          {{ $general->cur_sym }}{{ getAmount($user->deposits->where('status', 1)->sum('amount')) }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- .card -->
              </div><!-- .col -->
              <div class="col-md-6 col-lg-4">
                <div class="nk-wg-card is-s1 card card-bordered">
                  <div class="card-inner">
                    <div class="nk-iv-wg2">
                      <div class="nk-iv-wg2-title">
                        <h6 class="title">@lang('Total Invest') <em class="icon ni ni-info"></em></h6>
                      </div>
                      <div class="nk-iv-wg2-text">
                        <div class="nk-iv-wg2-amount c ">
                          {{ $general->cur_sym }}{{ getAmount($user->invests->sum('amount')) }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- .card -->
              </div><!-- .col -->
              <div class="col-md-6 col-lg-8">
                <div class="nk-wg-card is-s1 card card-bordered">
                  <div class="card-inner">
                    <div class="nk-iv-wg2">
                      <div class="nk-iv-wg2-title">
                        <h6 class="title">@lang('Total Withdraw') <em class="icon ni ni-info"></em></h6>
                      </div>
                      <div class="nk-iv-wg2-text">
                        <div class="nk-iv-wg2-amount c">
                          {{ $general->cur_sym }}{{ getAmount($user->withdrawals->where('status', 1)->sum('amount')) }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- .card -->
              </div><!-- .col -->
              <div class="cryptohopper-web-widget" data-id="7" data-label_design="3" data-coins="bitcoin,ethereum,tether,bnb,xrp,matic-network" data-numcoins="undefined" data-realtime="on"></div>
            </div><!-- .row -->
          </div><!-- .nk-block -->
          <div class="nk-block">
            <div class="row gy-gs">
              <div class="col-md-12 col-lg-12">
                <div class="nk-wg-card card card-bordered h-100">
                  <div class="card-inner h-100">
                    <div class="nk-iv-wg2">
                      <div class="nk-iv-wg2-title">
                        <h6 class="title">Balance in Account</h6>
                      </div>
                      <div class="nk-iv-wg2-text">
                        <div class="nk-iv-wg2-amount ui-v2 c">
                          {{ $general->cur_sym }}{{ number_format($user->interest_wallet + $user->deposit_wallet, 2) }}
                        </div>
                        <ul class="nk-iv-wg2-list ">
                          <li>
                            <span class="item-label">Available Funds</span>
                            <span
                              class="item-value" style="color:#1940b1">{{ $general->cur_sym }}{{ number_format($user->deposit_wallet, 2) }}</span>
                          </li>
                          <li>
                            <span class="item-label">Interest Wallet</span>
                            <span
                              class="item-value "style="color:#1940b1">{{ $general->cur_sym }}{{ number_format($user->interest_wallet, 2) }}</span>
                          </li>
                          <li class="total">
                            <span class="item-label">Total</span>
                            <span
                              class="item-value "style="color:#1940b1">{{ $general->cur_sym }}{{ number_format($user->interest_wallet + $user->deposit_wallet, 2) }}</span>
                          </li>
                        </ul>
                      </div>
                      <div class="nk-iv-wg2-cta">
                        <a href="{{ route('user.withdraw') }}" class="btn btn-primary btn-lg btn-block">Withdraw
                          Funds</a>
                        <a href="{{ route('user.deposit') }}" class="btn btn-trans btn-block">Deposit Funds</a>
                      </div>
                    </div>
                  </div>
                </div><!-- .card -->
              </div><!-- .col -->

            </div><!-- .row -->
          </div><!-- .nk-block -->
          <div class="nk-block">
            <div class="card card-bordered">
              <div class="nk-refwg">
                <div class="nk-refwg-invite card-inner">
                  <div class="nk-refwg-head g-3">
                    <div class="nk-refwg-title">
                      <h5 class="title">Refer Us & Earn</h5>
                      <div class="title-sub">Use the bellow link to invite your friends.</div>
                    </div>
                    <div class="nk-refwg-action">
                      <a href="#" class="btn btn-primary">Invite</a>
                    </div>
                  </div>
                  <div class="nk-refwg-url">
                    <div class="form-control-wrap">
                      <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied"
                        data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span
                          class="clipboard-text">Copy Link</span></div>
                      <div class="form-icon">
                        <em class="icon ni ni-link-alt"></em>
                      </div>
                      <input type="text" class="form-control copy-text" id="refUrl"
                        value="{{ route('user.refer.register', [Auth::user()->username]) }}">
                    </div>
                  </div>
                </div>
                <div class="nk-refwg-stats card-inner bg-lighter">
                  <div class="nk-refwg-group g-3">
                    <div class="nk-refwg-name">
                      <h6 class="title">My Referral <em class="icon ni ni-info" data-toggle="tooltip"
                          data-placement="right" title="Referral Informations"></em></h6>
                    </div>
                    <div class="nk-refwg-info g-3">
                      <div class="nk-refwg-sub c">
                        <div class="title">{{$totalReferral}}</div>
                        <div class="sub-text">Total Joined</div>
                      </div>
                      <div class="nk-refwg-sub c">
                        <div class="title">
                          {{ $general->cur_sym }}{{ getAmount($user->commissions->sum('commission_amount')) }}</div>
                        <div class="sub-text">Referral Earn</div>
                      </div>
                    </div>
                    <div class="nk-refwg-more dropdown mt-n1 mr-n1">
                      <a href="#" class="btn btn-icon btn-trigger" data-toggle="dropdown"><em
                          class="icon ni ni-more-h"></em></a>
                    </div>
                  </div>
                  <div class="nk-refwg-ck  ">
                    <canvas class="chart-refer-stats " id="refBarChart"></canvas>
                  </div>
                </div>
              </div>
            </div><!-- .card -->
          </div><!-- .nk-block -->



          <div class="nk-block">
            <div class="card card-bordered">
              <div class="table-responsive--md table-responsive">
                <table class="table style--two">
                  <thead>
                    <tr>
                      <th>@lang('Date')</th>
                      <th>@lang('Transaction ID')</th>
                      <th>@lang('Amount')</th>
                      <th>@lang('Wallet')</th>
                      {{--<th>@lang('Details')</th>--}}
                      <th>@lang('Post Balance')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($transactions as $trx)
                      <tr>
                        <td data-label="@lang('Date')">{{ showDatetime($trx->created_at, 'd/m/Y') }}</td>
                        <td data-label="@lang('Trans ID')"><span class="text-primary">{{ $trx->trx }}</span>
                        </td>

                        <td data-label="@lang('Amount')">
                          @if ($trx->trx_type == '+')
                            <span class="text-success">+
                              {{ __($general->cur_sym) }}{{ getAmount($trx->amount) }}</span>
                          @else
                            <span class="text-danger">-
                              {{ __($general->cur_sym) }}{{ getAmount($trx->amount) }}</span>
                          @endif
                        </td>
                        <td data-label="@lang('Wallet')">
                          @if ($trx->wallet_type == 'deposit_wallet')
                            <span class="badge badge-info">@lang('Deposit Wallet')</span>
                          @else
                            <span class="badge badge-primary">@lang('Interest Wallet')</span>
                          @endif
                        </td>
                        {{--<td data-label="@lang('Details')">{{ $trx->details }}</td>--}}
                        <td data-label="@lang('Post Balance')"><span>
                            {{ __($general->cur_sym) }}{{ getAmount($trx->post_balance) }}</span></td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="100%" class="text-center">{{ __('No Transaction Found') }}</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div><!-- row end -->


        </div>
      </div>
    </div>
  </div>



@endsection

<script src="https://www.cryptohopper.com/widgets/js/script"></script>



@push('style')
  <style type="text/css">
    #copyBoard {
      cursor: pointer;
    }

  </style>
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
