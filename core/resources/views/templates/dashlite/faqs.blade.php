@extends($activeTemplate.'layouts.frontend')
@section('content')

<style>
    .a{color:#fcae04;}
</style>

<section class="pt-200 pb-200">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header"><br>
              <h2 class="section-title"><span class="font-weight-normal">Frequently Asked</span> <b class="a">Questions</b></h2>
              <p>{{ __(@$faqCaption->data_values->sub_heading) }}</p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center">
          <div class="col-lg-8">
              
            <div class="card card-bordered">
                                            <div class="card-inner ">
                                                <div id="accordion-1" >
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head " data-toggle="collapse" data-target="#accordion-item-1-1">
                                                            <h6 class="title "style="color:#fcae04">How do I create my account?</h6>
                                                            <span class="accordion-icon a"></span>
                                                        </a>
                                                        <div class="accordion-body collapse show" id="accordion-item-1-1" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>Registration process is very easy and will take a few moments to complete Simply click Sign up button and fill in all the required fields</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-2">
                                                            <h6 class="title">What if I decide to cancel my relationship with you?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-2" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>There is never any obligation to stay with our program. So in the unlikely event that you are not completely satisfied, you may terminate the relationship at any time by notifying us immediately.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-3">
                                                            <h6 class="title">How do I make a deposit?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-3" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>To deposit funds in your trading account is quick and simple For your convenience you may choose one of the several available deposit methods To make a successful deposit please follow the steps below Login to your account Click on the DEPOSITS button in the DASHBOARD section Choose the deposit option And follow the steps to complete your transaction</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-3">
                                                            <h6 class="title">how many times can i make a deposit?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-3" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>Yes you can make as many deposit as you want on any of our investment plans except the starter plan where you can only invest 3 times after which you make a choice to continue investing with us or not</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-4">
                                                            <h6 class="title">How long does my deposit take before it can reflect on my Loftycede.org account dashboard?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-4" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>Your deposit will be reflected immediately once it is confirmed on the blockchain network</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-5">
                                                            <h6 class="title">Is there a minimum withdrawal amount?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-5" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>No. You can withdraw any remaining balance in your account that is not currently being used to secure open trades, however, please note, if the requested amount is lower than the processing fee, we won’t be able to proceed with the request.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-6">
                                                            <h6 class="title">How long does it take to process my withdrawal?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-6" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>Once we receive your withdrawal request we process immediately and send to your wallet Address</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-7">
                                                            <h6 class="title">What makes you different from many others?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-7" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>We have no conflicts of interest that could adversely affect your portfolio performance. Unlike many brokers and other financial advisors, we receive no compensation from brokerages or mutual fund companies for investing in their funds. Our only goal is to find the best investments available to meet your objectives.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-item">
                                                        <a href="#" class="accordion-head collapsed" data-toggle="collapse" data-target="#accordion-item-1-8">
                                                            <h6 class="title">What are the advantages of becoming your client?</h6>
                                                            <span class="accordion-icon"></span>
                                                        </a>
                                                        <div class="accordion-body collapse" id="accordion-item-1-8" data-parent="#accordion-1">
                                                            <div class="accordion-inner">
                                                                <p>Your account will be managed by a professional money manager. We monitor the financial markets every day and regularly review your portfolio to ensure that an optimal blend of investments is being used to meet your individual goals. This provides our clients with many benefits, including more time to pursue what really interests them.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section><br>






@endsection