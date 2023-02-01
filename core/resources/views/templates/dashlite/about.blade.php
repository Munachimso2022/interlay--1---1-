@extends($activeTemplate.'layouts.frontend')
@section('content')
@php
    $aboutCaption = getContent('about.content',true);
@endphp
<section class="about-section pt-120 pb-120 bg_img"><img src="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }}" width="200" srcset="{{ getImage(imagePath()['logoIcon']['path'] . '/logo.png') }} 2x" alt="logo" alt="Girl in a jacket" ></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-6">
            <div class="about-content">
              <h2 class="section-title mb-3"><span class="font-weight-normal" style="color:#fcae04">{{ __(@$aboutCaption->data_values->heading_w) }}</span> <b class="base--color">{{ __(@$aboutCaption->data_values->heading_c) }}</b></h2>
              <p>Loftycede Investment is a highly rated fund management service provider that deals mainly with gold trading and mining, Forex trading, along with other precious metal trading using spot, margin and CFD trading approaches. And also deals with domestic and foreign stocks, money market instruments, bonds and other securities. We also believe in investing into start-ups that have a very high potential to grow.</p>
              
             <p> Loftycede  appreciate the trust the investors have in us all throughout the world. Even at difficult times when other businesses are suffering due to pandemics, war, economic and social unrest, we on the other hand have been able to support our investors and our employees and even support their families as well. We are grateful to our clients in keeping trust in us and investing in us and we promise to keep the trust and pay back the profits along with the other bonuses promptly and diligently.</p>

<p>Our success in balancing out the multiple businesses and reaping profits, and then supporting the community back even when most of the governments have failed makes us very proud.</p>
              <a href="{{ __(@$aboutCaption->data_values->button_link) }}" class="btn btn-primary">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </section><br>

@endsection


