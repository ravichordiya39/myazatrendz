@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')

        <section class="site-content">
      <div class="page-banner-section">
        <div class="page-banner page-banner-bg">
          <div class="container">
            <div class="page-banner-wrap">
              <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                <ul class="breadcrumb-items">
                  <li class="breadcrumb-item trail-begin"><a href="{{url('/')}}" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">About Us</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page-banner-section -->
      <div class="content-wrapper about_myaza">
        <div class="container">
          <div class="page-header text-center">
            <h1 class="page-title">About Myaza History</h1>
          </div>
          <div class="content-area">
            <div class="content-section">
              <p class="text-center">Myaza is Founded in 2014, Amrut Collection is regarded as the highly well-known entity involved in manufacturing of Ladies Kurti, Ladies Tunics, Ladies Western Dresses, Ladies Tops and many more. These are available in various sizes, lengths, patterns, and designs. Our garments are designed by our qualified workers as per the latest trends and styles using best fabric collections.</p>
           
            <div class="row">
                <div class="col-md-6 count-box">
                    <div class="count-number">
                        <strong>Myaza is Founded in 2014</strong>
                        <p>Myaza is Founded in 2014, Amrut Collection is regarded as the highly well-known entity involved in manufacturing of Ladies Kurti, Ladies Tunics, Ladies Western Dresses, Ladies Tops and many more. These are available in various sizes, lengths, patterns, and designs. Our garments are designed by our qualified workers as per the latest trends and styles using best fabric collections.</p>
                        <p>These are available in various sizes, lengths, patterns, and designs. Our garments are designed by our qualified workers as per the latest trends and styles using best fabric collections.</p>
                    </div>
                </div>
                <div class="col-md-6 count-box">
                    <div class="count-img"><img class="d-block img-fluid" src="{{url('frontend')}}/images/about-img.jpg" alt="">
                    </div>
                </div>
            </div>
            <hr/>
            <h4>Our Profile</h4>
            <p>Myaza is Founded in 2014, Amrut Collection is regarded as the highly well-known entity involved in manufacturing of Ladies Kurti, Ladies Tunics, Ladies Western Dresses, Ladies Tops and many more. These are available in various sizes, lengths, patterns, and designs. Our garments are designed by our qualified workers as per the latest trends and styles using best fabric collections.</p>
            
            <p>The exclusive pieces of designer kurtis and fashion tunic-tops found here are updated with latest trends in the market. It takes you through the high flying colors of latest kurti designs and Palazzo set. The team of Myaza is involved in manufacturing indigenous women's ethnic wear by combining the Western style with that of Indian culture.</p>
            
            <p>The exclusive pieces of designer kurtis and fashion tunic-tops found here are updated with latest trends in the market. It takes you through the high flying colors of latest kurti designs and Palazzo set. The team of Myaza is involved in manufacturing indigenous women's ethnic wear by combining the Western style with that of Indian culture..</p>
 
 

            </div>

            <div class="testimonial-section section">
              <div class="section-header text-center">
                <h2 class="section-title">Customer Reviews</h2>
                <p class="section-desc">What Our Customers Saying</p>
              </div>
               <div class="testimonial-carousel">
                  @foreach( $testimonials as $testimonial )
                  <div class="testimonial-item">
                    <div class="testimonial-wrap">
                      <div class="testimonial-content">
                        <div class="testimonial-quote"><i class="fa fa-quote-left"></i></div>
                        <p>
                          {{$testimonial->description}}
                        </p>
                      </div>
                      <div class="testimonail-image-title">
                        <div class="testimonial-image">
                          <img src="<?php echo asset("file/$testimonial->image");?>" alt="">
                        </div>
                        <div class="testimonial-title-wrap">
                          <h4 class="testimonial-title">{{$testimonial->gender}} -  {{$testimonial->full_name}}</h4>  
                          <p class="testimonial-meta">{{$testimonial->city}}</p>
                        </div>
                      </div>
                    </div>
                  </div> 
                  @endforeach 
                  <!-- testimonial-item -->
                </div>
            </div>
            <!-- testimonial-section  -->

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
