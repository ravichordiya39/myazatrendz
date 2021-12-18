@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')

    <section class="home-site-content">
      <div class="slider-section">
        <div class="slider-carousel">
          <!--div class="slider-item">
            <div class="slider-images">
              <img src="{{asset('frontend/images/slider-img6.jpg')}}" />
            </div>
          </div-->
            @if(count($banners)>0)
                @foreach($banners as $banner)
		          <div class="slider-item">
		            <div class="slider-images">
		              <img src="{{asset('file/'.$banner->image)}}" />
		            </div>
		          </div>
                @endforeach
		    @endif
      </div>
      <!--=====================================================
                             Slider Section End
              =========================================================-->
      <!-- <div class="usp-section section">
        <div class="container">
          <div class="usp-wrapper">
            <div class="row">
              <div class="usp-first usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.4s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-shipping-fast"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title"> World-Wide Shipping </h4>
                    <p class="usp-desc">
                      We offer Worldwide shipping options through our website </p>
                  </div>
                </div>
              </div>
              <div class="usp-second usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.5s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-money-bill-alt"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      3 Days returns </h4>
                    <p class="usp-desc">
                      Returns are accepted within 3 days from delivery </p>
                  </div>
                </div>
              </div>
              <div class="usp-third usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-lock"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      Secure payments </h4>
                    <p class="usp-desc">
                      You can perform confidently the payment. it’s 100% secure. </p>
                  </div>
                </div>
              </div>
              <div class="usp-fourth usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
                <div class="usp-wrap">
                  <div class="usp-icon">
                    <i class="fas fa-handshake"></i>
                  </div>
                  <div class="usp-content">
                    <h4 class="usp-title">
                      Trust worthy </h4>
                    <p class="usp-desc">
                      We are verified supplier on alibaba.com for last 10 years. </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      <!--=====================================================
                                    usp Section End
       =========================================================-->
       
       <div class="shop-offer-section shop-look section">
          <div class="container-custom">
              <div class="section-header text-center">
                <h2 class="section-title">Shop by Look</h2>               
            </div>
            <div class="shop-offer-wrapper">
              <div class="row shop-offer-row">
	            @foreach($categoriesis_shop_by_look as $val)
                <div class="shop-offer-item col-lg-4 col-md-4 col-sm-6 col-12 wow animate__animated animate__fadeIn" data-wow-delay="0.3">
                  <div class="shop-offer-wrap">
                    <a href="{{$val->slug}}">
                      <div class="shop-offer-image">
                        <img src="{{asset('file/'.$val->image)}}" alt="">
                      </div>
                      <div class="shop-offer-summery">
                        <h4 class="shop-offer-title">{{$val->name}}</h4>
<!--                         <p class="shop-offer-content">{{$val->name}}</p> -->
                        <button href="{{$val->slug}}" class="shop-offer-btn">Shop Now</buttona>
                      </div>
                    </a>
                  </div>
                </div>
				@endforeach
              </div>
            </div>
          </div>
        </div>
 
       <!--=====================================================
                       product Section End
       =========================================================--> 

       <div class="product-collection-section section">
        <div class="container-custom">
            <div class="section-header text-center">
                <h2 class="section-title">Shop by Category</h2>               
            </div>
            
            <div class="product-collection-wrapper">
                <div class="product-carousel">
	                
	              @foreach($categoriesis_home as $val)
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <div class="product-collection-wrap">
                            <div class="product-collection-image"><a href="{{$val->slug}}">
                        <img src="{{asset('file/'.$val->image)}}" alt="">
                                </a>
                            </div>
                            <div class="product-collection-summery">
                                <h4 class="product-collection-title"> <a href="{{$val->slug}}">{{$val->name}}</a></h4>                                                             
                            </div>
                        </div>
                    </div>
                @endforeach
<!--
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-collection-wrap">
                          <div class="product-collection-image"><a href="#">
                                  <img src="{{asset('frontend/images/kurti4.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-collection-summery">
                            <h4 class="product-collection-title"> <a href="#">Flared Kurta</a></h4>                                                         
                        </div>
                      </div>
                    </div>
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-collection-wrap">
                          <div class="product-collection-image"><a href="#">
                                  <img src="{{asset('frontend/images/kurti5.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-collection-summery">
                            <h4 class="product-collection-title"> <a href="#">Frontslit Kurta</a></h4>                                                        
                        </div>
                      </div>
                    </div>
                    <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                      <div class="product-collection-wrap">
                          <div class="product-collection-image"><a href="#">
                                  <img src="{{asset('frontend/images/kurti9.jpg')}}" alt="" />
                              </a>
                          </div>                         
                          <div class="product-collection-summery">
                            <h4 class="product-collection-title"> <a href="#">Kurta Palazzo</a></h4>                                                         
                        </div>
                      </div>
                  </div>
                  <div class="product-collection-item col-lg-4 col-md-4 col-sm-12 col-12 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                    <div class="product-collection-wrap">
                        <div class="product-collection-image"><a href="#">
                                <img src="{{asset('frontend/images/kurti7.jpg')}}" alt="" />
                            </a>
                        </div>                       
                        <div class="product-collection-summery">
                          <h4 class="product-collection-title"> <a href="#">Straight Kurta</a></h4>                                                       
                      </div>
                    </div>
                  </div>
-->
              </div>
            </div>
        </div>
      </div>
      <!--=====================================================
                      Product Category Section End
      =========================================================-->
      <div class="product-offer-section section">
        <div class="container-custom">
            <div class="section-header text-center">
                <h2 class="section-title">Trending Products</h2>               
            </div>
      <div class="row product-offer-row">
        <div class="product-offer-item col-lg-6 col-md-6 col-sm-6  col-6">
          <div class="product-offer-image">
            <a href="#"><img src="{{asset('frontend/images/image-1.jpg')}}" alt=""></a>
          </div>
        </div>
         <div class="product-offer-item col-lg-6 col-md-6 col-sm-6  col-6">
          <div class="product-offer-image">
            <a href="#"><img src="{{asset('frontend/images/image-2.jpg')}}" alt=""></a>
          </div>
        </div>
      </div>
      </div>
    </div>
         <!--=====================================================
                      Product Category Section End
      =========================================================-->
@if(count($trending)>0)

      <div class="product-section section">
        <div class="container-custom">
            
          <div class="section-header">
            <h2 class="section-title">Trending Products</h2>
            <p class="section-description">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas</p>
            <div class="section-view-all">
              <a class="view-all" href="#">View All</a>
            </div>
        </div>
            <div class="product-wrapper">
              <div class="products with-bg-white product-carousel">
                 @foreach($trending as $trendin)

                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="{{url('product')}}/{{$trendin->slug}}">
                                    <?php $c = 0; ?>
                                    @foreach($trendin->productProductImages as $img)
                                    <?php $c++; ?>
                                    @if($c === 1)
                                            <img src="<?php echo asset("file/$img->file_name");?>" class="img-responsive" alt="">
                                    @endif
                                    @endforeach
                          </a>
                          <div class="product-label"> 
                              <span class="new-title">
                                  @if($trendin['discount_type'] ==1)
                                    Sale
                                  @elseif($trendin['discount_type'] ==2)
                                    Sale
                                  @else
                                    New
                                  @endif  
                              </span>
                              <span class="sale-title">
                                  {{$trendin['discount']}}
                                    @if($trendin['discount_type'] ==1)
                                      %
                                    @elseif($trendin['discount_type'] ==2)
                                      Flat
                                    @else
                                    @endif
                              </span>   
                          </div>
                          <?php if( Auth::user() ){ 
                            $check_wish = \App\Models\Wishlist::where('user_id',\Auth::user()->id)->where('product_id',$trendin['id'])->first(); 
                            if( $check_wish ){
                          ?>
                              <div class="product-action product-wishlist-a">
                                  <a class="wishlist" href="{{url('remove-from-wishlist')}}/{{$trendin['id']}}" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist">
                              <?php }else{ ?>
                                <div class="product-action">
                                  <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$trendin['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                              <?php } ?>
                          <?php }else{ ?>
                          <div class="product-action">
                              <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$trendin['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                          <?php } ?>
                                <i class="fa fa-heart"></i>
                              </a>
                              <a href="{{url('single-add-to-cart')}}/{{$trendin['id']}}" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">                  
                                  <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>  
                              </a>
                              <a href="{{route('product.detail',$trendin->slug)}}" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                  <i class="fa fa-eye"></i>
                              </a>
                          </div>
                      </div>
                      <div class="product-content">           
                          <h3 class="product-title">
                              <a href="{{route('product.detail',$trendin->slug)}}" > {{$trendin->name}}</a>
                          </h3>
                          <?php
                            $variations = $trendin->productProductVariations->whereNull('deleted_at');
                            $mrp_price = "";
                            $sale_price = "";

                            foreach($variations as $var){
                               if($var->primary_variation === 1){
                                   $mrp_price = $var->single_price;
                                   $sale_price = $var->single_sales_price;
                               }
                            }
                          ?>    
                          <div class="product-price">
                              <span class="new-price">₹{{$sale_price}}</span>                
                              <span class="old-price">₹{{$mrp_price}}</span>                
                          </div> 
                      </div>
                  </div>
                </div>
                
                @endforeach
              </div>
            </div>          
        </div>   
      </div>
 @endif
       <!--=====================================================
                      Product Section End
      =========================================================-->

      <div class="product-section section">
        <div class="container-custom">
          <div class="content-box">
            <div class="section-header">
                <h2 class="section-title">New Arrivals</h2>
                <p class="section-description">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas</p>
                <div class="section-view-all">
                  <a class="view-all" href="#">View All</a>
                </div>
            </div>
            <div class="product-wrapper">
              <div class="products product-carousel">

	            @foreach($newproductsarr as $new)
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">

                        <a href="#">
                        <?php $c = 0; ?>
                        @foreach($new->productProductImages as $img)
                        <?php $c++; ?>
                        @if($c === 1)
                                <img src="<?php echo asset("file/$img->file_name");?>" alt="">
                        @endif
                        @endforeach

                        </a>
                          <div class="product-label"> 
                              <span class="new-title">
                                  @if($new['discount_type'] ==1)
                                    Sale
                                  @elseif($new['discount_type'] ==2)
                                    Sale
                                  @else
                                    New
                                  @endif  
                              </span>
                              <span class="sale-title">
                                  {{$new['discount']}}
                                    @if($new['discount_type'] ==1)
                                      %
                                    @elseif($new['discount_type'] ==2)
                                      Flat
                                    @else
                                    @endif
                              </span>    
                          </div>
                          
                              

                              <?php if( Auth::user() ){ 
                                $check_wish = \App\Models\Wishlist::where('user_id',\Auth::user()->id)->where('product_id',$new['id'])->first(); 
                                if( $check_wish ){
                              ?>
                                  <div class="product-action product-wishlist-a">
                                      <a class="wishlist" href="{{url('remove-from-wishlist')}}/{{$new['id']}}" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist">
                                  <?php }else{ ?>
                                    <div class="product-action">
                                      <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$new['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                  <?php } ?>
                              <?php }else{ ?>
                              <div class="product-action">
                                  <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$new['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                              <?php } ?>
                                    <i class="fa fa-heart"></i>
                                  </a>

                              <a href="{{url('single-add-to-cart')}}/{{$new['id']}}" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">                  
                                  <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>  
                              </a>
                              <a href="{{route('product.detail',$new->slug)}}" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                  <i class="fa fa-eye"></i>
                              </a>
                          </div>
                      </div>
                      <div class="product-content">           
                          <h3 class="product-title">
                              <a href="{{route('product.detail',$new->slug)}}" >{{$new->name}}</a>
                          </h3>
                          <?php
                            $variations = $new->productProductVariations->whereNull('deleted_at');
                            $mrp_price = "";
                            $sale_price = "";

                            foreach($variations as $var){
                               if($var->primary_variation === 1){
                                   $mrp_price = $var->single_price;
                                   $sale_price = $var->single_sales_price;
                               }
                            }
                          ?>    
                          <div class="product-price">
                              <span class="new-price">₹{{$sale_price}}</span>                
                              <span class="old-price">₹{{$mrp_price}}</span>                
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
       <!--=====================================================
                      Product Section End
      =========================================================-->
            <!--=====================================================
                      Shop Section End
      =========================================================-->
     @if(count($hotesale) > 0)

        <div class="product-section section">
          <div class="container-custom">           
            <div class="section-header">
                <h2 class="section-title">Deal Of The Day</h2>
                <p class="section-description">Designs according to your requirements</p>
                <div class="section-view-all">
                  <a class="view-all" href="#">View All</a>
                </div>
            </div>
            <div class="product-wrapper">
              <div class="products with-bg-white product-carousel">
	              
	           @foreach($hotesale as $hotesaledata)

                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">

                            <?php $h = 0; ?>
                            @foreach($hotesaledata->productProductImages as $img)
                             <?php $h++; ?>
                             @if($h === 1)
                                    <img src="<?php echo asset("file/$img->file_name");?>" alt="">
                             @endif
                            @endforeach

                           </a>
                          <div class="product-label"> 
                              <span class="new-title">
                                  @if($hotesaledata['discount_type'] ==1)
                                    Sale
                                  @elseif($hotesaledata['discount_type'] ==2)
                                    Sale
                                  @else
                                    New
                                  @endif  
                              </span>
                              <span class="sale-title">
                                  {{$hotesaledata['discount']}}
                                    @if($hotesaledata['discount_type'] ==1)
                                      %
                                    @elseif($hotesaledata['discount_type'] ==2)
                                      Flat
                                    @else
                                    @endif
                              </span>    
                          </div>
                          <?php if( Auth::user() ){ 
                                $check_wish = \App\Models\Wishlist::where('user_id',\Auth::user()->id)->where('product_id',$hotesaledata['id'])->first(); 
                                if( $check_wish ){
                              ?>
                                  <div class="product-action product-wishlist-a">
                                      <a class="wishlist" href="{{url('remove-from-wishlist')}}/{{$hotesaledata['id']}}" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist">
                                  <?php }else{ ?>
                                    <div class="product-action">
                                      <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$hotesaledata['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                  <?php } ?>
                              <?php }else{ ?>
                              <div class="product-action">
                                  <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$hotesaledata['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                              <?php } ?>
                                    <i class="fa fa-heart"></i>
                                  </a>
                              <a href="{{url('single-add-to-cart')}}/{{$hotesaledata['id']}}" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">                  
                                  <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>  
                              </a>
                              <a href="{{route('product.detail',$hotesaledata->slug)}}" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
                                  <i class="fa fa-eye"></i>
                              </a>
                          </div>
                      </div>
                      <div class="product-content">           
                          <h3 class="product-title">
                              <a href="{{route('product.detail',$hotesaledata->slug)}}" >{{$hotesaledata->name}}</a>
                          </h3>
                          <?php
                            $variations = $hotesaledata->productProductVariations->whereNull('deleted_at');
                            $mrp_price = "";
                            $sale_price = "";

                            foreach($variations as $var){
                               if($var->primary_variation === 1){
                                   $mrp_price = $var->single_price;
                                   $sale_price = $var->single_sales_price;
                               }
                            }
                          ?>        
                          <div class="product-price">
                              <span class="new-price">₹{{$sale_price}}</span>                
                              <span class="old-price">₹{{$mrp_price}}</span>                
                          </div> 
                      </div>
                  </div>
                </div>

			   @endforeach	
				
              </div>
            </div>            
          </div>   
        </div>
     
     @endif   
         <!--=====================================================
                      Product Section End
      =========================================================-->


      <div class="testimonial-section section">     
        <div class="container">           
        <div class="section-header text-center">
          <h2 class="section-title">Customer Reviews</h2> 
          <p class="section-description">What Our Customers Saying</p>
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
    </div>
      <!--=====================================================
                      Testimonial Section End
      =========================================================-->
      
      <div class="insta-title">
          <div class="container">
          FIND US ON INSTAGRAM <br> <a href="{{$setting->instagram_link}}" target="_new">{{$setting->instagram_profile}}</a>
          </div>
      </div>
      
    <!--  <div class="testimonial-section section"> -->
 
    <!--    <div class="row mx-auto my-auto">-->
    <!--    <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">-->
    <!--        <div class="carousel-inner w-100" role="listbox">-->
    <!--            <div class="carousel-item active">-->
    <!--                <img class="d-block col-3 img-fluid" src="{{asset('frontend/images/kurti5.jpg')}}" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="{{asset('frontend/images/kurti2.jpg')}}" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="{{asset('frontend/images/kurti3.jpg')}}" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="{{asset('frontend/images/kurti1.jpg')}}" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="{{asset('frontend/images/kurti2.jpg')}}" alt="">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img class="d-block col-3 img-fluid" src="{{asset('frontend/images/kurti8.jpg')}}" alt="">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">-->
    <!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
    <!--            <span class="sr-only">Previous</span>-->
    <!--        </a>-->
    <!--        <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">-->
    <!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
    <!--            <span class="sr-only">Next</span>-->
    <!--        </a>-->
    <!--    </div>-->
    <!--</div>-->
 
    <!--  </div>-->
    
    <div class="product-section section">
        <div class="container-custom">
            <div class="product-wrapper">
              <div class="products with-bg-white product-carousel">
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{asset('frontend/images/kurti10.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{asset('frontend/images/kurti8.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{asset('frontend/images/kurti3.jpg')}}"  alt="">
                          </a>                          
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{asset('frontend/images/kurti6.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{asset('frontend/images/kurti1.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
                <div class="product-item animate__animated animate__fadeInUp">
                  <div class="product-wrap">
                      <div class="product-image">
                          <a class="pro-img" href="#">
                              <img src="{{asset('frontend/images/kurti6.jpg')}}"  alt="">
                          </a>
                      </div>
                  </div>
                </div>
                <!-- product-item -->
              </div>
            </div>          
        </div>   
      </div>
      
      <div class="usp-section section free-shipping">
        <div class="container">
          <div class="usp-wrapper">
            <div class="row">
              @foreach($usps as $usp)
                  <div class="usp-item col-lg-3 col-md-3 col-sm-6 col-12 wow animate__animated animate__bounceIn" data-wow-delay="0.4s">
                    <div class="usp-wrap">
                      <div class="usp-icon">
                        <i class="fas {{ $usp->image }}"></i>
                      </div>
                      <div class="usp-content">
                        <h4 class="usp-title"> {{ $usp->title }} </h4>
                        <p class="usp-desc">{{ $usp->description }}</p>
                      </div>
                    </div>
                  </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

    </section>
    <!--=====================================================
                      Mainpage Section End
    =========================================================-->

 @endsection

 @push('scripts')

 @endpush

