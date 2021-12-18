@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')

<!--Slider Section start here-->
<section class="top-banner">
    <div  class="container-fluid padlr0">
       <div class="row">
          <div class="col-lg-12">
             <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @if(count($banners)>0)
                        <?php $i = 0; ?>
                            @foreach($banners as $banner)

                              <li data-target="#carousel-example-generic" data-slide-to="{{$i}}"></li>
                              <?php $i++; ?>
                            @endforeach
                      @endif

                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">

                    <?php if(count($banners)>0){
                        $i = 1;
                        foreach($banners as $banner){

                            if($i==1){
                             ?>
                            <div class="item active">
                                <a href="{{$banner->url}}" target="_blank">
                                <img style="max-width: 100%;" src="<?php echo asset('file/'.$banner->image.'');?>" alt="Slider">
                                </a>
                             </div>
                            <?php }else{ ?>
                            <div class="item">
                                <a href="{{$banner->url}}" target="_blank">
                                <img style="max-width: 100%;" src="<?php echo asset('file/'.$banner->image.'');?>" alt="Slider">
                                </a>
                             </div>
                           <?php  }
                        $i++; }
                    } ?>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fas  fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fas  fa-angle-right"></i>
                </a>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!--Slider Section end here-->

<!-- New Arrivals Section start here -->
<section class="top-banner">
    <div class="leaf1 leaf2"><img src="{{ asset('frontend/images/leaf_img.jpg') }}"></div>
    <div class="leaf1"><img src="{{asset('frontend/images/leaf_img.jpg')}}"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading-title text-center">
            <h2 class="title-txt">New Arrivals</h2>
            <img src="{{asset('frontend/images/headline.png')}}">
            </div>
            <?php $j= 0; ?>
            <div class="col-md-6">
            <div class="row">
                @foreach($newarrivals as $new)
                <?php $j++ ; ?>
                @if($j === 1 || $j === 2)
                <div class="root-img-box">
                    <div class="side-img col-md-12">
                        <a href="{{$new->link}}" target="_blank">
                        <img height="90%" class="img-fluid" src="{{ asset("file/$new->image") }}"
                            alt="{{$new->image}}" />
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            </div>
            <div class="col-md-6 bigss">
            <?php $k = 0; ?>
            @foreach($newarrivals as $new)
            <?php $k++; ?>
                @if($k === 3)
                <div class="root-img-box">
                <a href="{{$new->link}}" target="_blank">
                <img class="img-fluid" src="{{ asset("file/$new->image") }}" alt="{{$new->image}}" />
                </a>
                </div>
                @endif
            @endforeach
        </div>
        </div>
        </div>
    </div>
</section>
<!-- New Arrivals Section start here -->>

@if(count($trending)>0)
       <!--Proudct item Slider Start here-->
       <div>
        <div class="container">
           <div class="row">
              <div class="col-lg-12">
                 <div class="home-product product-slider">
                    <div class="owl-carousel owl-theme home-product-slider">
                     @foreach($trending as $trendin)
                       <div class="item">
                          <div class="product-card">
                             <div>
                                <div id="f1_container">
                                   <div id="f1_card" class="shadow">
                                        <?php $c = 0; ?>
                                        @foreach($trendin['images'] as $img)
                                        <?php $c++; ?>
                                        @if($c === 1)
                                            <div class="front face">
                                                <img src="<?php echo asset("file/$img->file_name");?>" class="img-responsive" alt="">
                                            </div>
                                        @elseif($c === 2)
                                            <div class="back face center">
                                                <img src="{{asset("file")}}/{{$img->file_name}}" class="img-responsive" alt="">
                                            </div>
                                        @endif
                                        @endforeach

                                   </div>
                                </div>
                             </div>
                             <div class="text-caption">
                                <p><strong>{{$trendin['category']}}</strong> {{$trendin['name']}}</p>
                                <p> <span class="price-txt">Rs.{{$trendin['single_sales_price']}}</span> <span class="price-oveline">Rs.{{$trendin['single_mrp_price']}}</span> <span class="discount-text">{{$trendin['discount']}}
                                <?php
                                if($trendin['discount_type'] ==1)
                                   { echo "%"; }
                                elseif($trendin['discount_type'] ==2)
                                { echo "Flat"; }
                                else {}
                                ?>
                                </span></p>
                                <p class="pro-rating">
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                   <i class="fa fa-star" aria-hidden="true"></i>
                                   (1)
                                </p>
                             </div>
                             <div class="caption-hover">
                                <a href="" class="prod-info" id="{{$trendin['id']}}">QUICK VIEW</a>
                               <!--<span class="circle-size"  >
                                   <p>Select Size </p>
                                   <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a>
                                </span>
                                <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                <div class="text-caption">
                                   <p><strong>Kurty</strong> Dry Woven Team Training</p>
                                </div>
                                <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                --->
                             </div>
                             <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>
                          </div>
                       </div>
                     @endforeach
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
@endif
     <section>
        <div class="container">
           <div class="row">
              <div class="col-md-12 text-center heading-title">
                 <h2 class="title-txt">Best Seller</h2>
                 <img src="{{asset('frontend/images/headline.png')}}">
              </div>
              <div class="col-xs-12">
                 <div class="row">
                    @foreach($bestsellers as $best)
                    <div class="col-sm-6 col-xs-12">
                       <div class="catImg">
                        <a href="{{$best->link}}" target="_blank">
                            <img src="{{ asset("file/$best->image") }}" class="img-responsive" alt="{{$best->image}}">
                        </a>
                       </div>
                    </div>
                    @endforeach

                 </div>
              </div>
           </div>
        </div>
     </section>
     @if(count($hotesale) > 0)
     <section class="colorfulbg">
        <div style="padding-top:60px;">
           <div class="container">
              <div class="row">
                 <div class="col-lg-12">
                    <div class="home-product best_seller">
                       <div class="owl-carousel owl-theme  home-product-slider">
                           @foreach($hotesale as $hotesaledata)
                          <div class="item">
                             <div class="product-card">
                                <div>
                                   <div id="f1_container">
                                      <div id="f1_card" class="shadow">
                                        <?php $h = 0; ?>
                                        @foreach($hotesaledata['images'] as $img)
                                         <?php $h++; ?>
                                         @if($h === 1)
                                            <div class="front face">
                                                <img src="<?php echo asset("file/$img->file_name");?>" class="img-responsive" alt="">
                                            </div>
                                         @elseif($h === 2)
                                            <div class="back face center">
                                                <img src="{{asset("file")}}/{{$img->file_name}}" class="img-responsive" alt="">
                                            </div>
                                         @endif
                                        @endforeach
                                      </div>
                                   </div>
                                </div>
                                <div class="text-caption">
                                   <p><strong>{{$hotesaledata['category']}}</strong> {{$hotesaledata['name']}}</p>
                                   <p> <span class="price-txt">Rs.{{$hotesaledata['single_sales_price']}}</span> <span class="price-oveline">Rs.{{$hotesaledata['single_mrp_price']}}</span> <span class="discount-text">{{$hotesaledata['discount']}}
                                   @if($hotesaledata['discount_type'] ==1)
                                       %
                                   @elseif($hotesaledata['discount_type'] ==2)
                                       Flat
                                   @else

                                   @endif
                                   </span></p>
                                   <p class="pro-rating">
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      <i class="fa fa-star" aria-hidden="true"></i>
                                      (1)
                                   </p>
                                </div>
                                <div class="caption-hover">
                                    <a href="" class="prod-info" id="{{$hotesaledata['id']}}">QUICK VIEW</a>
                                </div>
                                <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>
                             </div>
                          </div>
                          @endforeach
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </section>
     @endif
     @if(count($latest)>0)
     <section>
         <div class="col-md-12 text-center heading-title">
               <h2 class="title-txt">Latest</h2>
               <img src="{{asset('frontend/images/headline.png')}}">
           </div>
           @if(count($banners)>0)
            @foreach($banners as $banner)
                @if($loop->iteration==1)
                <section class="vasvi-offer-banner">
                    <div class="container">
                        <a href="{{$banner->url}}" target="_blank">
                        <img src="{{ asset("file/$banner->image")}}" alt="" />
                        </a>
                    </div>
                </section>
                @endif
            @endforeach
           @endif
          <div style="padding-top:60px;">
               <div class="container">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="home-product vasvi_exclusive_slider">
                           <div class="owl-carousel owl-theme home-product-slider">
                              @foreach($latest as $latestdata)
                              <div class="item">
                                 <div class="product-card">
                                    <div>
                                       <div id="f1_container">
                                          <div id="f1_card" class="shadow">
                                            <?php $l = 0; ?>
                                            @foreach($latestdata['images'] as $img)
                                             <?php $l++; ?>
                                             @if($l === 1)
                                                <div class="front face">
                                                    <img src="<?php echo asset("file/$img->file_name");?>" class="img-responsive" alt="">
                                                </div>
                                             @elseif($l === 2)
                                                <div class="back face center">
                                                    <img src="{{asset("file")}}/{{$img->file_name}}" class="img-responsive" alt="">
                                                </div>
                                             @endif
                                            @endforeach
                                          </div>
                                       </div>
                                    </div>
                                    <div class="text-caption">
                                       <p><strong>{{$latestdata['category']}}</strong> {{$latestdata['name']}}</p>
                                       <p> <span class="price-txt">Rs.{{$latestdata['single_sales_price']}}</span> <span class="price-oveline">Rs.{{$latestdata['single_mrp_price']}}</span> <span class="discount-text">{{$latestdata['discount']}}
                                       @if($latestdata['discount_type'] ==1)
                                         %
                                       @elseif($latestdata['discount_type'] ==2)
                                         Flat
                                       @else

                                       @endif
                                       </span></p>
                                       <p class="pro-rating">
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          (1)
                                       </p>
                                    </div>
                                    <div class="caption-hover">
                                       <a href="" class="prod-info" id="{{$latestdata['id']}}">QUICK VIEW</a>
                                       <!--<span class="circle-size"  >
                                          <p>Select Size </p>
                                          <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a>
                                       </span>
                                       <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                       <div class="text-caption">
                                          <p><strong>Kurty</strong> Dry Woven Team Training</p>
                                       </div>
                                       <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>--->
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      </section>
      @endif
      @if(count($trending)>0)
     <section class="insta-title">
         <div class="container">
           <h2>FIND US ON INSTAGRAM <br> <a href="https://www.instagram.com/vasvi/" target="_new">@vasvi</a></h2>
              <div class="row">
                     <div class="col-lg-12">
                        <div class="home-product vasvi_exclusive_slider">
                           <div class="owl-carousel owl-theme home-product-slider">
                              @foreach($trending as $trend)
                              <div class="item">
                                 <div class="product-card">
                                    <div>
                                       <div id="f1_container">
                                        <?php $l = 0; ?>
                                        @foreach($trend['images'] as $img)
                                         <?php $l++; ?>
                                         @if($l === 1)
                                            <div class="front face">
                                                <img src="<?php echo asset("file/$img->file_name");?>" class="img-responsive" alt="">
                                            </div>
                                         @elseif($l === 2)
                                            <div class="back face center">
                                                <img src="{{asset("file")}}/{{$img->file_name}}" class="img-responsive" alt="">
                                            </div>
                                         @endif
                                        @endforeach
                                       </div>
                                    </div>
                                    <div class="text-caption">
                                       <p><strong>{{$trend['category']}}</strong> {{$trend['name']}}</p>
                                       <p> <span class="price-txt">Rs.{{$trend['single_sales_price']}}</span> <span class="price-oveline">Rs.{{$trend['single_mrp_price']}}</span> <span class="discount-text">{{$trend['discount']}}
                                        @if($trend['discount_type'] ==1)
                                        %
                                        @elseif($trend['discount_type'] ==2)
                                            Flat
                                        @else

                                        @endif
                                       </span></p>
                                       <p class="pro-rating">
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                          (1)
                                       </p>
                                    </div>
                                    <div class="caption-hover">
                                       <a href="" class="prod-info" id="{{$latestdata['id']}}">QUICK VIEW</a>
                                       <!--<span class="circle-size"  >
                                          <p>Select Size </p>
                                          <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a>
                                       </span>
                                       <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                       <div class="text-caption">
                                          <p><strong>Kurty</strong> Dry Woven Team Training</p>
                                       </div>
                                       <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>--->
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>
                                 </div>
                              </div>
                              @endforeach
                           </div>
                        </div>
                     </div>
                  </div>
         </div>
     </section>
     @endif

 @endsection

 @push('scripts')

 @endpush

