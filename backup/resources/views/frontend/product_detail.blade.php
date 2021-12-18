@extends('frontend.layouts.app')
@push('styles')
<style>
    .size-active{
        background-color: #FB8071;
        color : white !important;
    }
    .size-deactive{
        background-color: white;
        color : black !important;
    }

    .color-active{
        border : 2px solid #FB8071;
    }
    .color-deactive{
        border : 1px solid grey;
    }
</style>
@endpush
@section('content')
<div class="container" >
          <ol class="breadcrumb">
              <li><a href="index.html">{{$info['category']}}</a></li>
              <li><a href="category.html">{{$info['sub_category']}}</a></li>
              <li class="active">{{$info['child_category']}}</li>
          </ol>
         <div class="product-detail">
            <div class="row">
               <!--  =================   Product Slider start Left side =========================  -->
               <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-12  ps-silder">
                        <main class='main-wrapper'>
                              <article class='product-details-section'>
                                 <!-- breadcrum with structured data parameters for ga -->
                                 <section>
                                    <div class="small-img">
                                       <img src="{{asset('frontend/images/online_icon_right@2x.png')}}" class="icon-left" alt="" id="prev-img">
                                       <div class="small-container">
                                          <div id="small-img-roll" >
                                            <?php
                                            $count = 0;
                                            $color_id = "";
                                            $primary_img = "";
                                            $single_price = "";
                                            $single_sales_price = "";
                                            $avail_size = [];
                                            $avail_colors = [];
                                            $size_id = "";
                                            $qty = "";
                                            $iterator = 0;
                                            $stop_item = 0;
                                            ?>
                                            @foreach($info['variations'] as $variation)
                                              <?php
                                                array_push($avail_size, $variation->size_id);
                                                array_push($avail_colors, $variation->color_id);
                                              ?>
                                              <?php $iterator++; ?>
                                              @if($variation->primary_variation == 1)
                                                <?php $stop_item = $iterator; ?>
                                                @foreach($info['images'] as $img)
                                                  @if($img->product_color_id === $stop_item)
                                                  <?php $count++; ?>
                                                    @if($count === 1)
                                                    <?php
                                                       $color_id = $variation->color_id;
                                                       $primary_img = $img->file_name;
                                                       $single_price = $variation->single_price;
                                                       $single_sales_price = $variation->single_sales_price;
                                                       $size_id = $variation->size_id;
                                                       $qty = $variation->single_price_quantity;
                                                    ?>
                                                    @endif
                                                  <img src="{{asset('file')}}/{{$img->file_name}}" class="show-small-img" alt="">
                                                 @endif
                                                @endforeach
                                              @endif
                                           @endforeach
                                          </div>
                                       </div>
                                       <img src="{{asset('frontend/images/online_icon_right@2x1.png')}}" class="icon-right" alt="" id="next-img">
                                    </div>
                                    <div class="show" href="{{asset('file')}}/{{$primary_img}}">
                                       <img src="{{asset('file')}}/{{$primary_img}}" id="show-img">
                                    </div>
                                 </section>
                                 <div class='clear'></div>
                              </article>
                        </main>
                        <div for='' id='sizeselected'></div>
                     </div>
                  </div>
               </div>
               <!--  =================   Product Slider END LEFT side =========================  -->
               <!--  =================   Add to cart start Right side =========================  -->
               <?php
                $array = array_unique($avail_size);
                $sizes = \App\Models\Size::all();
               ?>
               <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="title-product">
                           <h1>{{$info['category']}}   {{$info['sub_category']}}  {{$info['child_category']}}   <span class="my-pro-name">{{$info['name']}}</span></h1>
                        </div>
                        <div class="rating_star">
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                           <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="ml-3"><a data-toggle="modal" data-target="#myModal" href="#" >Write a Review</a></span>
                        </div>

                            <span class="view_detail ml-3" style="position: relative;" >
                                <a class="theme-color" href="javascript:void(0);" tabindex="0" data-placement="bottom" data-trigger="hover" data-toggle="popover" data-popover-content="#a2"><b>View Details</b></a>

                                <div id="a2" class="hidden">
                                    <div class="popover-body">
                                       <p><b>Set Description:</b> 1 set = Total
                                       {{count($info['variations'])}}
                                       Pieces; 1 each of
                                        @foreach($array as $dsize)
                                            @foreach($sizes as $size)
                                                @if($size->id === $dsize)
                                                 {{$size->name}},
                                                @endif
                                            @endforeach
                                        @endforeach
                                       </p>
                                       <p>
                                        @foreach($info['attributes'] as $attr)
                                            <?php $at = \App\Models\Attribute::find($attr->attribute_id); ?>
                                            <?php $atv = \App\Models\AttributeValue::find($attr->attribute_value_id); ?>
                                            <tr>
                                                <b>@if($at) {{$at->name}} @endif</b>
                                                : @if($atv) {{$atv->value}} @endif </br>
                                            </tr>
                                        @endforeach
                                       </p>
                                       <p><b>Minimum Order:</b> 1 SET </p>
                                       <p><b>MRP:</b> {{$single_sales_price}} Per Piece </p>
                                       <p><b>Product code:</b> {{$info['sku']}} </p>
                                       <p><b>HSN code:</b> 6211 </p>
                                       <p><b>GST:</b> @5%</p>
                                    </div>
                                </div>

                              </span>
                        <p class="my-2">{!!$info['details'] !!}</p>
                        <div class="text-price-title">Offer Price</div>
                        <div class="product-price">
                            <span class="bold-price">
                                <i class="fas fa-rupee-sign" style="font-size:18px;"></i> <span class="sale-price">{{$single_sales_price}}</span>
                                <span class="cut-price">
                                    <i class="fas fa-rupee-sign" style="font-size:14px;"></i>
                                    <span class="mrp-price">{{$single_price}}</span>
                                    <span class="text-success txt-discount">
                                        @if($info['discount_type'] === 1)
                                            {{$info['discount']}}%
                                        @else
                                            {{$info['discount']}} &nbsp; Flat
                                        @endif
                                    </span>
                                </span>
                            </span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="product-size">
                           <ul>

                              <li class="boldtxt">Size</li>
                              @foreach($array as $dsize)
                                @foreach($sizes as $size)
                                  @if($size->id === $dsize)
                                    <li ><a href="#" id="size-circle"

                                        @foreach($info['variations'] as $var)
                                          @if($var->size_id == $dsize)
                                           @if($var->size_status !== 1)
                                            class="disabled"
                                           @elseif($var->primary_variation === 1)
                                            class="size-active"
                                           @else
                                            class="size-deactive"
                                           @endif
                                           data-id="{{$var->size_id}}"
                                          @endif
                                        @endforeach
                                        >{{$size->name}}</a></li>
                                    <!-- <li><a href="#" class="disabled">S</a></li> -->
                                  @endif
                                @endforeach
                              @endforeach

                           </ul>
                        </div>
                        <div class="product-color">
                           <ul>
                              <li class="boldtxt">Color</li>
                              <div class="color-scale">
                                 <ul>
                                   <?php
                                     $arrays = array_unique($avail_colors);
                                     $colors = \App\Models\Color::all();
                                   ?>
                                   @foreach($arrays as $arr)
                                      @foreach($colors as $color)
                                            @if($color->id === $arr)
                                            <li
                                            <?php $ccount = 0; ?>
                                            @foreach($info['variations'] as $var)
                                                @if($var->color_id == $color->id)
                                                    <?php $ccount++; ?>
                                                    @if($var->size_status !== 1)
                                                    class="cl1 disabled"
                                                    @elseif($var->primary_variation === 1)
                                                    class="cl1 color-active"
                                                    @else
                                                    class="cl1 color-deactive"
                                                    @endif
                                                    data-id="{{$var->color_id}}"
                                                    data-count="{{$ccount}}"
                                                @endif
                                            @endforeach

                                            style="background-color : {{$color->value}};" id="color-circle"><a href="#"></a></li>
                                         @endif
                                      @endforeach
                                   @endforeach
                                 </ul>
                                 </div>
                           </ul>
                        </div>
                        <div>
                           <div class="row quantity">
                              <div class="col-md-3" style="padding-right:0px;">
                                 <div class="input-group display-flex" >
                                    <span class="input-group-btn">
                                    <button type="button" class="btn   btn-number" style="background:#ed6388;" data-type="minus" data-field="quant[2]" id="minus">
                                    <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                    </span>
                                    <input type="text" name="quant[2]" id="quantity-pro" class="form-control input-number" value="{{$qty}}" min="1" max="100">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn   btn-number" style="background:#ed6388;" data-type="plus" data-field="quant[2]" id="plus">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                    </span>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <button type="button" class="btn-wishlist"> <i class="fa fa-heart" aria-hidden="true"></i></button>
                                  <button id="share_icons" class="btn-wishlist" type="button"> <i class="fas fa-share-alt"></i></button>

                                  <div id="div3" style="display: none; width: 0;">
                                  <div class="share_icons">
                                      <div class="card card-body">
                                        <div class="footer_social">
                                            <ul>
                                               <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                               <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                               <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                               <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                               <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                               <li><a href="#"><i class="fab fa-google"></i></a></li>
                                            </ul>
                                         </div>
                                      </div>
                                    </div>
                                  </div>

                              </div>

                           </div>
                        </div>
                        <div class="mb-5">
                            <span class="delivery-address ">
                                <h5>Check Delivery Service Availability</h5>
                              <span class="boldtxt"><i class="fas fa-map-marker-alt theme-color mr-2"></i> Delivery</span>
                              <input class="form-control-1" type="text" placeholder="Check your area availability" />
                              <button class="btn-check text-success">Check</button>
                           </span>
                           <span class="delivery-address ">
                               <h5>Connect To A Store</h5>
                              <span class="boldtxt"><i class="fas fa-map-marker-alt theme-color mr-2"></i> Store</span>
                              <input class="form-control-1" type="text" placeholder="Enter a pincode store name" />
                              <button class="btn-check text-success">Check</button>
                           </span>
                          <div class="mt-4">
                              <div style="color: red;" class="box-border"> <i class="fa fa-times mr-3" aria-hidden="true"></i> Service Not available in youe area Pin-code.</div>
                              <div style="color: green;" class="box-border"><i class="fa fa-map-marker mr-3" aria-hidden="true"></i> Delivery possible in your area</div>
                              <div  class="box-border"><i class="fa fa-cart-arrow-down mr-3" aria-hidden="true"></i> Delivered Within 4-6 Working Days</div>
                              <div  class="box-border"><i class="fa fa-shopping-bag mr-3" aria-hidden="true"></i>Free Shipping Above Rs.999/- In India Only</div>
                          </div>
                        </div>
                        <div>
                           <button type="button" class="btn-addcart" data-id="{{$info['id']}}">Add to Cart</button>
                           <button type="button" class="btn-buynow" data-id="{{$info['id']}}">Buy Now</button>
                        </div>

                        <div class="row authentic-product-row clearfix pt-3 mt-3"  >
                           <div class="col-md-4 text-center" >
                           <i class="fas fa-cloud-meatball"></i>
                           <p> 100% Authentic Products</p>

                           </div>

                           <div class="col-sm-3 text-center" >
                               <i class="fas fa-shipping-fast"></i>
                               <p>Free Shipping*</p>
                             </div>

                             <div class="col-md-4 text-center" >
                                  <i class="fab fa-usps"></i>
                                  <p>Easy Return Policy</p>
                               </div>
                             </div>

                     </div>
                  </div>
               </div>
               <!--  ================ Tab Section Start ======================== -->
               <div class="clear"></div>
               <div class="container product-description">
                  <h3>Product Detail</h3>
                  <div class="col-md-4 col-sm-12">
                     <strong>Product Description</strong>
                     <p>{{$info['description']}}</p>
                     <p>Product code: {{$info['sku']}}<br/>Need help? <a href="#">Contact us</a></p>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <table width="100%" cellspacing="0" cellpadding="0" border="0" class="table-product-des" >
                        <tbody>
                           @foreach($info['attributes'] as $attr)
                              <?php $at = \App\Models\Attribute::find($attr->attribute_id); ?>
                              <?php $atv = \App\Models\AttributeValue::find($attr->attribute_value_id); ?>
                              <tr>
                                    <th>@if($at) {{$at->name}} @endif</th>
                                    <td>@if($atv) {{$atv->value}} @endif</td>
                              </tr>
                          @endforeach
                        </tbody>
                     </table>
                  </div>
                  <div class="col-md-4 col-sm-12">
                     <p><strong>Care Instructions</strong> <br/>Hand wash </p>
                     <p><strong>DISCLAIMER:</strong> <br/>Colors of the product might appear slightly different on digital devices. </p>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="container">
                     <ul class="nav nav-tabs product-detail-tab" role="tablist">
                        <li role="presentation" class="active"><a href="#product-detail" aria-controls="product-detail" role="tab" data-toggle="tab">BRAND INFO</a></li>
                        <li role="presentation"><a href="#rating" aria-controls="rating" role="tab" data-toggle="tab">Rating & Review</a></li>
                        <li role="presentation"><a href="#return" aria-controls="return" role="tab" data-toggle="tab">Return</a></li>
                        <li role="presentation"><a href="#delivery" aria-controls="delivery" role="tab" data-toggle="tab">Care</a></li>
                     </ul>
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="product-detail">
                           <p>Take this pink multicolor suit-set home and adorn a different&nbsp;look this time. It is a set of three. A polymetallic&nbsp;multicolour&nbsp;kurta, contrasting blue skirt and a dupatta matching to the skirt. It is a gorgeous set and will look just fabulous with mid-heel sandals and matching&nbsp;jewellery.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="rating">
                           <div class="product_detail rating-panel">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="ratingleft">
                                       <p> <span>400/</span><span style="font-size: 25px">5</span> <i class="fa fa-star" aria-hidden="true"></i></p>
                                       <p class="rate_title">Overall rating 1</p>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <ul class="rating-recommend">
                                       <li>Do you recommend this product?</li>
                                       <li><button type="button" class="btn btn-pink" data-toggle="modal" data-target="#myModal">  Write a review</button>
                                        </li>


                                          <!-- Modal -->
                                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header modal-header-black">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                  <h4 class="modal-title text-white" id="myModalLabel">Write A Review</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <DIV class="review-box review-box-border">
                                                      <p>Rate the product :<span class="small"> Select the number of stars.</span></p>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>
                                                      <i class="fa fa-star" aria-hidden="true"></i>

                                                   </DIV>

                                                   <div class="review-box">
                                                      <p>Review Title</p>
                                                      <input id="reviewHeadline_id" name="headline" class=" form-control" placeholder="E.g. Nice Product | Max 50 characters" maxlength="50" type="text" value="" autocomplete="on">
                                                   </div>
                                                   <div class="review-box">
                                                      <p>Your review</p>
                                                       <textarea id="reviewComment_id" name="comment" class="form-contr"   placeholder="Write your review here" maxlength="300"></textarea>
                                                   </div>
                                                   <div class="review-box">
                                                       <input type="checkbox" id="checkbox" name="isRecommended" checked=""> <label for="checkbox">Yes, I recommend this product</label>
                                                   </div>


                                                   <div class="review-box row">
                                                        <div class="col-xs-6">
                                                           <input type="reset" name="button" id="reset" value="cancel" class="cancel_button btn-review-cancel btn-block">
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <input type="submit" name="button" id="button" value="Submit" class="sbt-button btn-submit-review btn-block">
                                                        </div>
                                                   </div>

                                                </div>
                                            </div>
                                          </div>
                                       </div>


                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="return">
                           <div class="col-md-4 col-sm-12 text-center returns-col">
                              <i class="far fa-calendar-alt"></i>
                              <p>
                                 <Strong>Easy Returns</Strong><br/><br/>
                                 If you are not completely satisfied with your purchase, you can return most items to us within 14 days of delivery to get a 100% refund. We offer free and easy returns through courier pickup, or you can exchange most items bought online at any of our stores across India.<br/>
                                 <a href="#">For More details read our Return Policy</a>
                              </p>
                           </div>
                           <div class="col-md-4 col-sm-12 text-center returns-col">
                              <i class="far fa-calendar-alt"></i>
                              <p>
                                 <Strong>Easy Exchange</Strong><br/><br/>
                                 If you are not completely satisfied with your purchase, you can return most items to us within 14 days of delivery to get a 100% refund. We offer free and easy returns through courier pickup, or you can exchange most items bought online at any of our stores across India.<br/>
                                 <a href="#">For More details read our Return Policy</a>
                              </p>
                           </div>
                           <div class="col-md-4 col-sm-12 text-center returns-col">
                              <i class="fas fa-shopping-bag"></i>
                              <p>
                                 <Strong>Delivery</Strong><br/><br/>
                                 Typically Delivered in 5-7 days.<br/>
                                 <a href="#">For More details read our Exchange Policy *T & C Apply</a>
                              </p>
                           </div>
                        </div>
                        <!--  ================ Tab Section end ======================== -->
                     </div>
                  </div>



               </div>
            </div>
         </div>
      </div>
       @if(count($trending)>0)
       <section>
          <div class="col-md-12 text-center heading-title">
                <h2 class="title-txt">You may also like </h2>
                <img src="{{asset('frontend/images/headline.png')}}">
            </div>
           <div style="padding-top:60px;">
                <div class="container">
                   <div class="row">
                      <div class="col-lg-12">
                         <div class="home-product vasvi_exclusive_slider">
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
                                        <p><strong>{{$trendin['category']}}</strong> {{$trendin['name']}}g</p>
                                        <p> <span class="price-txt">Rs.{{$trendin['single_sales_price']}}</span> <span class="price-oveline">Rs.{{$trendin['single_mrp_price']}}</span> <span class="discount-text">{{$trendin['discount']}}
                                        @if($trendin['discount_type'] ==1)
                                           %
                                        @elseif($trendin['discount_type'] ==2)
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
                                        <a href="" class="prod-info" id="{{$trendin['id']}}">QUICK VIEW</a>
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
@endsection

@push('scripts')

<script>

    var product = <?php echo json_encode($info );?>;
    var variation = {};
    var variations = product.variations;
    var pimages = [];
    for(var i = 0 ; i < variations.length; i++){
        var color_id = $(document).find('.color-active').attr('data-id');
        var size_id = $(document).find('.size-active').attr('data-id');
        var color_count = $(document).find('.color-active').attr('data-count');
        var final_images = [];
        if(variations[i]['color_id'] == color_id && variations[i]['size_id'] == size_id){
               var images = product.images;
                console.log(images);
                for(var j = 0 ; j < images.length; j++){
                   if(images[j]['product_color_id'] == color_count){
                    final_images.push(images[j]['file_name']);
                   }
                }
             console.log(final_images);
            variation = variations[i];
            pimages = final_images;
        }
    }

    $('body').click(function(e){
        // e.preventDefault();
        // $(document).find('#size-circle').attr('class','size-active');

    })
    $(document).on('click','#size-circle', function(e){
      e.preventDefault();
      var $this = $(this);
      $(document).find('#size-circle').removeClass('size-active').addClass('size-deactive');
      $this.removeClass('#size-deactive').addClass('size-active');
      load_price();
    });

    $(document).on('click','#color-circle', function(e){
      e.preventDefault();
      var $this = $(this);
      $(document).find('.color-active').attr('class',"cl1 color-deactive");
      $this.removeAttr('class');
      $this.attr('class',"cl1 color-active");
      load_price();
    });

    function load_price(){
        var color_id = $(document).find('.color-active').attr('data-id');
        var color_count = $(document).find('.color-active').attr('data-count');
        var size_id = $(document).find('.size-active').attr('data-id');

        var variations = product.variations;
        for(var i = 0 ; i < variations.length; i++){
            var final_images = [];
            if(variations[i]['color_id'] == color_id && variations[i]['size_id'] == size_id){
                var mrp = variations[i]['single_price'];
                var sale_mrp = variations[i]['single_sales_price'];
                $(document).find('.mrp-price').html(mrp);
                $(document).find('.sale-price').html(sale_mrp);
                var images = product.images;

                for(var j = 0 ; j < images.length; j++){
                   if(images[j]['product_color_id'] == color_count){
                    final_images.push(images[j]['file_name']);
                   }
                }
                console.log(final_images);
                pimages = final_images;
                variation = variations[i];

            }
        }

    }

    $(document).on('click','.btn-addcart', function(e){
        e.preventDefault();
        var dyvariation = variation;
        dyvariation.product_images = pimages;
        var qty = $(document).find('#quantity-pro').val();
        dyvariation.qty = qty;
        dyvariation.name = $(document).find('.my-pro-name').html();
        dyvariation._token = '{{ csrf_token() }}';

        $.ajax({
            url: '{{ route('cart.store') }}',
            method: "post",
            data: dyvariation,
            success: function (response) {
               var count = response.count;
               $(document).find('.cart-no').html(count);
               toastr.success('Success', response.message,{
                            positionClass: 'toast-top-center',
               });

               var cart = response.cart;
               var html = '<div class="rm-sec">';
               var total = 0;


                for(var i = 0 ; i < cart.length ; i++)
                {
                   var myimages = cart[i].product_images;
                   html += ` <li>
                                <div class="maindiv">
                                    <div class="img-boxs">
                                       <img src="{{asset('file')}}/${myimages[0]}">
                                    </div>
                                    <div class="cart-content">
                                        <h2><a href="#">${cart[i].name}</a></h2>
                                        <p> RS ${cart[i].single_sales_price}     <span>Quantity: ${cart[i].qty}</span></p>
                                    </div>
                                    <div class="cart-close">
                                        <a href="#" id="rm-cart" data-id="${cart[i].id}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </li>`;
                  total += total + (parseInt(cart[i].single_sales_price) * parseInt(cart[i].qty));
                }



                html += `<li class="total-cart">
                            <span class="aa-cartbox-total-title">Total</span>
                            <span class="aa-cartbox-total-price">₹${total}</span>
                        </li>`;
                html += `<li class="lastlist">
                            <a href="{{url('/cart')}}" class="procedtopay"> Proceed To Pay</a>
                        </li>`;
                html += '</div>';
                if(cart.length > 0){
                    $(document).find('.cart-items').html(html);
                }


            //    window.open("{{url('/cart')}}","_self");
            }
        });
    });


    $(document).on('click','#plus', function(){
       var count = $(document).find('#quantity-pro').val();
       count = parseInt(count) + 1;
       $(document).find('#quantity-pro').val(count++);
    });


    $(document).on('click','#minus', function(){
       var count = $(document).find('#quantity-pro').val();
       count = parseInt(count) > 1   ? parseInt(count) - 1 : 1;
       $(document).find('#quantity-pro').val(count);
    });

    $(document).ready(function(){
        $("#share_icons").click(function(){
        $("#div3").fadeToggle(500);
        });
    });

    $(".btn-wishlist").click(function () {
    $(".account-dropdown").show();
    });

    $(document).click(function (e) {
    if (!$(e.target).hasClass("btn-wishlist")
    && $(e.target).parents(".account-dropdown").length === 0)
    {
    $(".account-dropdown").hide();
    }
    });

    $(document).find('.search-icon').click(function(){
    $(document).find('.search-wrapper').toggleClass('open');
        $('body').toggleClass('search-wrapper-open');
    });
    $(document).find('.search-cancel').click(function(){
    $(document).find('.search-wrapper').removeClass('open');
    $('body').removeClass('search-wrapper-open');
    });

    $(function(){
            $(document).find("[data-toggle=popover]").popover({html : true,content: function() {
                var content = $(this).attr("data-popover-content");
                return $(content).children(".popover-body").html();
            },
            title: function() {
                var title = $(this).attr("data-popover-content");
                return $(title).children(".popover-heading").html();
            }
        });
    });
</script>
@endpush
