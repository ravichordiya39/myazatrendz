@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')

    <section class="site-content bg-gray">
      <div class="page-banner-section">
        <div class="page-banner page-banner-bg">
          <div class="container">
            <div class="page-banner-wrap">
              <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                <ul class="breadcrumb-items">
                  <li class="breadcrumb-item trail-begin"><a href="{{url('/')}}" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">FAQs</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page-banner-section -->
      <div class="content-wrapper">
        <div class="container">
          <div class="page-header text-center">
            <h1 class="page-title">FAQs</h1>
          </div>
            <div class="content-area">
              <div class="content-section">
              
                <div class="faqpageaccordion" id="accordionfaq">
                  <h4 class="mb-4">ORDERS ENQUIRIES:</h4>
                  @foreach( $array_data as $faq_key => $single_data )
                      <div class="faq-card">
                        <div class="faq-header">
                          <button class="faq-button @if( $faq_key != 0 ) collapsed @endif" type="button" data-toggle="collapse" data-target="#faq{{$faq_key}}" @if( $faq_key == 0 ) aria-expanded="true" @else aria-expanded="false" @endif>
                            {{$single_data->question}}
                          </button>
                        </div>
                        <div id="faq{{$faq_key}}" class="collapse @if( $faq_key == 0 ) show @endif" data-parent="#accordionfaq">
                          <div class="faq-body">
                            {{$single_data->answer}}
                          </div>
                        </div>
                      </div>
                  @endforeach
                  
                </div> 
                <!-- faqpageaccordion  -->
              </div>
            </div>
            <!--content-area-->         
        </div>
        <!--container-->
      </div>     
      <!--content-wrapper-->
    </section>

@endsection

@push('scripts')

@endpush
