@extends('frontend.layouts.app')
@push('styles')
<!-- <link rel="stylesheet" type="text/css" href="{{url('/')}}/frontend/slider/zoom-slider.css"> -->
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


    .reviews .overall_rating .num {
        font-size: 30px;
        font-weight: bold;
        color: #F5A624;
    }
    .reviews .overall_rating .stars {
        letter-spacing: 3px;
        font-size: 32px;
        color: #F5A624;
        padding: 0 5px 0 10px;
    }
    .reviews .overall_rating .total {
        color: #777777;
        font-size: 14px;
    }
    .reviews .write_review_btn, .reviews .write_review button {
        display: inline-block;
        background-color: #565656;
        color: #fff;
        text-decoration: none;
        margin: 10px 0 0 0;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 600;
        border: 0;
    }
    .reviews .write_review_btn:hover, .reviews .write_review button:hover {
        background-color: #636363;
    }
    .reviews .write_review {
        display: none;
        padding: 20px 0 10px 0;
    }
    .reviews .write_review textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        height: 150px;
        margin-top: 10px;
    }
    .reviews .write_review input {
        display: block;
        width: 250px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 10px;
    }
    .reviews .write_review button {
        cursor: pointer;
    }
    .reviews .review {
        padding: 20px 0;
        border-bottom: 1px solid #eee;
    }
    .reviews .review .name {
        padding: 0 0 3px 0;
        margin: 0;
        font-size: 18px;
        color: #555555;
    }
    .reviews .review .rating {
        letter-spacing: 2px;
        font-size: 22px;
        color: #F5A624;
    }
    .reviews .review .date {
        color: #777777;
        font-size: 14px;
    }
    .reviews .review .content {
        padding: 5px 0;
    }
    .reviews .review:last-child {
        border-bottom: 0;
    }
    .reviews .overall_rating span.stars {
      color: #004e96;
    }
    .update-rvw-btn, .cancel-rvw-btn{
      background-color: #004e96;
      border: medium none;
      color: #fff;
      display: inline-block;
      padding: 10px 15px;
      cursor: pointer;
    }
</style>
@endpush
@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}" />

    <section class="site-content">
      <div class="page-banner-section">
          <div class="page-banner page-banner-bg">
              <div class="container-custom">
                  <div class="page-banner-wrap">
                      <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                          <ul class="breadcrumb-items">
				              <li class="breadcrumb-item trail-begin"><a href="{{url('')}}/{{$info['category_slug']}}">{{$info['category']}}</a></li>
				              <li class="breadcrumb-item trail-end active"><a href="{{url('')}}/{{$info['category_slug']}}/{{$info['sub_category_slug']}}">{{$info['sub_category']}}</a></li>

                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="content-wrapper">      
          <div class="content-area">
              <div id="product-[]" class="single-product">
                  <div class="container-custom">
                      <div class="single-product-details">
                          <div class="row">
                              <div class="col-lg-6 col-md-12 col-sm-12 pr-xl-5">
                                  <div class="product-gallery">

                                      <div class="product-gallery-area product-gallery-with-images">
                                          <div class="product-label">
                                              <span class="new-title">
                                                @if($info['discount_type'] ==1)
                                                  Sale
                                                @elseif($info['discount_type'] ==2)
                                                  Sale
                                                @else
                                                  New
                                                @endif    
                                              </span>
                                              <span class="sale-title">{{$info['discount']}}
                                    @if($info['discount_type'] ==1)
                                      %
                                    @elseif($info['discount_type'] ==2)
                                      Flat
                                    @else
                                    @endif</span>
                                          </div>
                                          <div class="product-gallery-wrapper product-gallery-slider">
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
	                                              <div class="product-gallery-image">
	                                                  <div class="show" href="{{asset('file')}}/{{$img->file_name}}">
		                                                  <img id="show-img" class="show-img" src="{{asset('file')}}/{{$img->file_name}}" class="show-small-img" alt="" style="max-height: 750px;" xoriginal="{{asset('file')}}/{{$img->file_name}}">
		                                                </div>
	                                              </div>
                                                  
                                                 @endif
                                                @endforeach
                                              @endif
                                           @endforeach
                                          </div>
                                          <ol class="product-gallery-thumbs">
                                            @foreach($info['variations'] as $variation)
                                              @if($variation->primary_variation == 1)
                                                @foreach($info['images'] as $img_key => $img)
                                                    @if($img->product_color_id == $variation->color_id)
                                                     <li><img class="" src="{{asset('file')}}/{{$img->file_name}}" alt="" style="height: 100px;" @if( $img_key == 0 ) xpreview="{{asset('file')}}/{{$img->file_name}}" @endif></li>
                                                    @endif
                                                @endforeach
                                              @endif
                                           @endforeach
                                              

                                          </ol>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6 col-md-12 col-sm-12">
                                  <div class="summary product-summary">
                                      <h1 class="product-single-title">{{$info['category']}}   {{$info['sub_category']}}  {{$info['child_category']}}   <span class="my-pro-name">{{$info['name']}}</h1>
                                      
                                      <div class="product-price price single_product-price">
                                        <span class="new-price">₹{{$single_sales_price}}</span>
                                        <span class="old-price">₹{{$single_price}}</span>
                                        <span class="sale-title">
                                          @if($info['discount_type'] ==1)
                                            {{$info['discount']}}% Off
                                          @elseif($info['discount_type'] ==2)
                                            {{$info['discount']}} Flat Off
                                          @else
                                            New
                                          @endif 
                                        </span>
                                      </div>
                                      <div class="product-meta">
                                          <span class="product-meta-code"><strong>SKU Code : </strong> <span class="sku">{{$info['sku']}}</span></span>
                                          <span class="product-meta-code"><strong>Available Qty : </strong> <span class="available">{{$qty}}</span></span>
                                          <span class="product-meta-category"><strong>Categories : </strong> <a href="{{url('')}}/{{$info['category_slug']}}">{{$info['category']}}</a>, <a href="{{url('')}}/{{$info['category_slug']}}/{{$info['sub_category_slug']}}">{{$info['sub_category']}}</a></span>                                             
                                      </div>
               <?php
                $array = array_unique($avail_size);
                $sizes = \App\Models\Size::all();
                $get_sizes = \App\Models\ProductVariation::select(['product_variations.*','sizes.value as size_value','sizes.name as size_name'])->leftJoin('sizes', 'product_variations.size_id', '=', 'sizes.id')->where('product_variations.product_id',$info['id'])->groupby('product_variations.size_id')->get();
                $get_colors = \App\Models\ProductVariation::select(['product_variations.*','colors.value as color_value','colors.name as color_name'])->leftJoin('colors', 'product_variations.color_id', '=', 'colors.id')->where('product_variations.product_id',$info['id'])->groupby('product_variations.color_id')->get();
               ?>

                                      <!-- <div class="product-short-desription">
                                       <p>
	                                       {!!$info['details'] !!}
                                       </p>
                                      </div> -->

                                      <div class="product-summary-cart">
                                          <form class="variations-form addcart" action="{{url('add-to-cart')}}" method="post">
                                            @csrf
                                              <div class="product-summary-attribute">
                                                  <div class="attribute-group">
                                                    <table class="variations" cellspacing="0">
                                                      <tbody>
                                                          <tr>
                                                              <td class="label"><label for="pa_size">Size</label></td>
                                                              <td class="value">            
                                                                  <ul class="variable-items-wrapper button-variable-wrapper">
                                                                      @foreach( $get_sizes as $size_key => $single_size )
                                                                        <li class="variable-item-size variable-item @if($single_size->primary_variation == 1) {{'selected'}} @endif">
                                                                          <input data-id="{{$single_size->size_id}}" id="size_{{$single_size->size_value}}" type="radio" name="pa_size">
                                                                          <label  data-toggle="tooltip" for="size_{{$single_size->size_value}}" title="{{$single_size->size_name}}"><span class="size_variation_class">{{$single_size->size_name}}</span></label>
                                                                        </li>
                                                                      @endforeach
                                                                      
                                                                      
                                                                  </ul>
                                                              </td>
                                                          </tr>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                  <div class="size-chart">
                                                      <a href="javascript:void(0);" class="size-chart-button" data-target="#sizeModal" data-toggle="modal" type="button"><i class="fas fa-chart-bar"></i> Size Chart</a>
                                                      <div class="modal fade" id="sizeModal">
                                                          <div class="modal-dialog modal-dialog-centered modal-md">
                                                              <div class="modal-content">
                                                                  <button type="button" class="close" data-dismiss="modal"
                                                                      aria-label="Close"><span
                                                                          aria-hidden="true">×</span></button>
                                                                  <div class="modal-body">
                                                                      <table>
                                                                          <tbody>
                                                                              <tr>
                                                                                  <td width="86">Size</td>
                                                                                  <td width="96">Bust (in)</td>
                                                                                  <td width="97">Whist (in)</td>
                                                                                  <td width="103">Length (in)</td>
                                                                                  <td width="95">Hip (in)</td>
                                                                                  <td width="163">Across Shoulder
                                                                                      (in)
                                                                                  </td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td width="86">S</td>
                                                                                  <td width="96">38</td>
                                                                                  <td width="97">34</td>
                                                                                  <td width="103">56</td>
                                                                                  <td width="95">39</td>
                                                                                  <td width="163">14.5</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td width="86">M</td>
                                                                                  <td width="96">40</td>
                                                                                  <td width="97">36</td>
                                                                                  <td width="103">56</td>
                                                                                  <td width="95">41</td>
                                                                                  <td width="163">15</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td width="86">L</td>
                                                                                  <td width="96">42</td>
                                                                                  <td width="97">38</td>
                                                                                  <td width="103">56</td>
                                                                                  <td width="95">43</td>
                                                                                  <td width="163">15.5</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td width="86">XL</td>
                                                                                  <td width="96">44</td>
                                                                                  <td width="97">40</td>
                                                                                  <td width="103">56</td>
                                                                                  <td width="95">45</td>
                                                                                  <td width="163">16</td>
                                                                              </tr>
                                                                              <tr>
                                                                                  <td width="86">XXL</td>
                                                                                  <td width="96">46</td>
                                                                                  <td width="97">42</td>
                                                                                  <td width="103">56</td>
                                                                                  <td width="95">47</td>
                                                                                  <td width="163">16.5</td>
                                                                              </tr>
                                                                          </tbody>
                                                                      </table>
                                                                      <p>Garment Measurements in Inches</p>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="product-variations">
                                                <table class="variations" cellspacing="0">
                                                  <tbody>
                                                      <tr>
                                                          <td class="label"><label for="pa_color">Color</label></td>
                                                          <td class="value">            
                                                              <ul class="variable-items-wrapper button-variable-wrapper">
                                                                @foreach( $get_colors as $color_key => $single_color )
                                                                  <li class="variable-item-color variable-item @if($single_color->primary_variation == 1) {{'selected'}} @endif">
                                                                      <input id="color_{{$single_color->color_name}}" type="radio" data-id="{{$single_color->color_id}}" name="pa_color">
                                                                      <label  data-toggle="tooltip" for="color_{{$single_color->color_name}}" title="{{$single_color->color_name}}"><span style="background-color: {{$single_color->color_value}};"></span></label>
                                                                  </li>
                                                                @endforeach
                                                                  
                                                                  
                                                              </ul>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                              </div>
                                              <div class="wishlist-quantity-button">
                                                  <div class="quantity">
                                                      <label for="quantity"> Quantity </label>
                                                      <div class="quantity-group">
                                                          <a href="javascript:void(0)" class="dec qty-btn"></a>
                                                          <input type="text" id="quantity" class="input-text qty"
                                                              name="quantity" value="1" minlength="1" maxlength="{{$qty}}">
                                                          <a href="javascript:void(0)" class="inc qty-btn"></a>
                                                      </div>
                                                  </div>
                                                  <div class="single-wishlist-btn">
                                                      <?php if( Auth::user() ){ 
                                                        $check_wish = \App\Models\Wishlist::where('user_id',\Auth::user()->id)->where('product_id',$info['id'])->first(); 
                                                        if( $check_wish ){
                                                      ?>
                                                              <a class="add_to_wishlist single_add_to_wishlist" href="{{url('remove-from-wishlist')}}/{{$info['id']}}" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist">
                                                                <i class="fas fa-heart"></i> <span>Remove From Wishlist</span>
                                                              </a>
                                                          <?php }else{ ?>
                                                              <a class="add_to_wishlist single_add_to_wishlist" href="{{url('add-to-wishlist')}}/{{$info['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                                                <i class="far fa-heart"></i> <span>Add to  Wishlist</span>
                                                              </a>
                                                          <?php } ?>
                                                      <?php }else{ ?>
                                                          <a class="add_to_wishlist single_add_to_wishlist" href="{{url('add-to-wishlist')}}/{{$info['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                                            <i class="far fa-heart"></i> <span>Add to  Wishlist</span>
                                                          </a>
                                                      <?php } ?>
                                                  </div>
                                              </div>
                                              <div class="mb-5">
                                                  <span class="delivery-address ">
                                                      <h5>Check Delivery Service Availability</h5>
                                                    <span class="boldtxt"><i class="fas fa-map-marker-alt theme-color mr-2"></i> Delivery</span>
                                                    <input class="form-control-1" type="text" placeholder="Check your area availability" maxlength="6" id="pincode-input" style="border: 0px solid grey;">
                                                    <span class="btn-check text-success" id="pincode-check">Check</span>
                                                  </span>
                                                  <div class="mt-4 check-delivery-section">
                                                    <div style="color: red;display: none;" class="box-border" id="pincode-error"> <i class="fa fa-times mr-3" aria-hidden="true"></i> Service Not available in youe area Pin-code.</div>
                                                    <div style="color: green; display: none;" class="box-border" id="pincode-success"><i class="fa fa-map-marker mr-3" aria-hidden="true"></i> Delivery possible in your area</div>
                                                    <div class="box-border"><i class="fa fa-cart-arrow-down mr-3" aria-hidden="true"></i> Delivered Within 4-6 Working Days</div>
                                                    <div class="box-border"><i class="fa fa-shopping-bag mr-3" aria-hidden="true"></i>Free Shipping Above Rs.999/- In India Only</div>
                                                  </div>
                                              </div>
                                              <div class="product-summary-button">
                                                  <input type="submit" name="add" class="add_to_cart_button button" id="grouped-add-to-cart" value="Add to Cart">
                                                  @if( Auth::user() )
                                                    <button type="button" class="buy_now_button btn btn-outline-primary">Buy Now</button>
                                                  @else
                                                    <button type="button" class="buy_now_button btn btn-outline-primary" data-toggle="modal" data-target="#loginregister">Buy Now</button>
                                                  @endif
                                                  
                                              </div>
                                              <input type="hidden" name="product_id" value="{{$info['id']}}" id="set_product_id">
                                              <input type="hidden" name="product_price" value="{{$single_sales_price}}" id="set_product_price">
                                              <input type="hidden" name="product_color" value="{{$color_id}}" id="set_product_color">
                                              <input type="hidden" name="product_size" value="{{$size_id}}" id="set_product_size">
                                              <input type="hidden" name="product_name" value="{{$info['name']}}" id="set_product_size">
                                              <input type="hidden" name="product_image" value="{{$primary_img}}" id="set_product_image">
                                          </form>
                                      </div>
                                      <div class="product-share">
                                          <span>Share On : </span>
                                          <div class="product-share-icon">
                                              <a class="facebook" href="http://www.facebook.com/share.php?u={{url()->current()}}&t={{$info['name']}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                              <a class="twitter" href="http://twitter.com/share?text={{$info['name']}}&url={{url()->current()}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                              <a class="whatsapp is_check_web" href="http://web.whatsapp.com/send?text={{url()->current()}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                              <a class="whatsapp is_check_mobile" href="whatsapp://send?text={{url()->current()}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                              <a class="envelope" href="mailto:?subject={{$info['name']}}&body=Check out this site {{url()->current()}}" target="_blank"><i class="far fa-envelope"></i></a>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
  
                      </div>
                  </div>
  
              
  
                  <div class="product-information">
                      <div class="container-custom">
                          <ul class="nav single-product-tabs">
                              <li><a class="active" data-toggle="tab" href="#description">Description</a></li>
                              <li><a data-toggle="tab" href="#specification">Specification</a></li>
                              <li><a data-toggle="tab" href="#reviews">Reviews(<?= $rating_rev[0]->total_reviews ?>)</a></li>
                              <li><a data-toggle="tab" href="#shipping">Shipping</a></li>
                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane fade active show" id="description">
                                  <p><strong>Description</strong></p>
                                  <p>{!!$info['description'] !!}</p>
                              </div>
                              <div class="tab-pane fade" id="specification">
                                  <p><strong>Specification</strong></p>
                                  <p>{!!$info['details'] !!}</p>
                              </div>
                              <div class="tab-pane fade" id="reviews">
                                  <div id="reviews" class="review-form-section">
                                      <div class="comments">
                                        <?php if( empty($reviews) ){ ?>
                                          <p>There are no reviews for this product.</p>
                                        <?php }else{ ?>
                                          <div class="overall_rating">
                                              <span class="num"><?=number_format($rating_rev[0]->overall_rating, 1)?></span>
                                              <span class="stars"><?=str_repeat('&#9733;', round($rating_rev[0]->overall_rating))?></span>
                                              <span class="total"><?=$rating_rev[0]->total_reviews?> reviews</span>
                                          </div>
                                          <div class="all-reviews-section">
                                            <?php foreach( $reviews as $key => $review ){ ?>
                                              <div class="review">
                                                <h3 class="name"><?=htmlspecialchars($review->name, ENT_QUOTES)?></h3>
                                                <div>
                                                    <span class="rating"><?=str_repeat('&#9733;', $review->rating)?></span>
                                                    <span class="date"><?=time_elapsed_string($review->created_at)?></span>
                                                </div>
                                                <p class="content"><?=htmlspecialchars($review->content, ENT_QUOTES)?></p>
                                            </div>
                                            <?php } ?>   
                                          </div>
                                        <?php } ?>
                                      </div>
                                      <?php if(\Auth::check() ){ ?>
                                      <div class="review-form-wrapper">
                                          <?php if( empty($check_user_c) ){ ?>
                                          <h5 class="comment-reply-title">Add a review </h5>
                                          <form action="{{route('product_review.create')}}" method="post" id="commentform" class="comment-form">
                                            @csrf
                                              <div class="comment-form-rating">
                                                  <h4>Your Rating</h4>
                                                  <div class="stars-rating"> <span>Bad</span>
                                                      <span class="rating">
                                                          <input type="radio" id="star1" name="rating" value="1" checked />
                                                          <label for="star1" title="Sucks big time - 1 star"></label>
                                                          <input type="radio" id="star2" name="rating" value="2" />
                                                          <label for="star2" title="Kinda bad - 2 stars"></label>
                                                          <input type="radio" id="star3" name="rating" value="3" />
                                                          <label for="star3" title="Meh - 3 stars"></label>
                                                          <input type="radio" id="star4" name="rating" value="4" />
                                                          <label for="star4" title="Pretty good - 4 stars"></label>
                                                          <input type="radio" id="star5" name="rating" value="5" />
                                                          <label for="star5" title="Awesome - 5 stars"></label>
                                                      </span> <span>Good</span>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="comment-form-comment form-group col-12">
                                                      <label for="comment">Your Review <span
                                                              class="required">*</span></label>
                                                      <textarea class="form-control" id="comment" name="comment" cols="45"
                                                          rows="8" aria-required="true" required=""></textarea>
                                                  </div>
                                                  <div class="comment-form-author form-group col-md-6 col-sm-6 col-12">
                                                      <label for="author">Name <span class="required">*</span></label>
                                                      <input class="form-control" id="author" name="author" value="" size="30" aria-required="true" required="" type="text" placeholder="Name">
                                                  </div>
                                                  <div class="comment-form-email form-group col-md-6 col-sm-6 col-12">
                                                      <label for="email">Email <span class="required">*</span></label>
                                                      <input class="form-control" id="email" name="email" value="" size="30" aria-required="true" required="" type="email" placeholder="Email">
                                                  </div>
                                              </div>
                                              <div class="form-submit">
                                                  <input type="hidden" name="product_id" value="{{$info['id']}}">
                                                  <input name="submit" id="submit" class="btn btn-primary submit"
                                                      value="Submit" type="submit">
                                              </div>
                                          </form>
                                        <?php } else{ ?>
                                          <span class="update-rvw-btn">Update Review</span>
                                          <span class="cancel-rvw-btn" style="display:none;">Cancel</span>
                                          <div class="update-review-form" style="display: none;">
                                            <h5 class="comment-reply-title">Update a review </h5>
                                            <form action="{{route('product_review.update')}}" method="post" id="commentform" class="comment-form">
                                              @csrf
                                                <div class="comment-form-rating">
                                                    <h4>Your Rating</h4>
                                                    <div class="stars-rating"> <span>Bad</span>
                                                        <span class="rating">
                                                            <input @if( $check_user_r->rating == 1 ) {{'checked'}} @endif type="radio" id="star1" name="rating" value="1" required="required" />
                                                            <label for="star1" title="Sucks big time - 1 star"></label>
                                                            <input @if( $check_user_r->rating == 2 ) {{'checked'}} @endif type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="Kinda bad - 2 stars"></label>
                                                            <input @if( $check_user_r->rating == 3 ) {{'checked'}} @endif type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="Meh - 3 stars"></label>
                                                            <input @if( $check_user_r->rating == 4 ) {{'checked'}} @endif type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="Pretty good - 4 stars"></label>
                                                            <input @if( $check_user_r->rating == 5 ) {{'checked'}} @endif type="radio" id="star5" name="rating" value="5" />
                                                            <label for="star5" title="Awesome - 5 stars"></label>
                                                        </span> <span>Good</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="comment-form-comment form-group col-12">
                                                        <label for="comment">Your Review <span
                                                                class="required">*</span></label>
                                                        <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true" required="">{{$check_user_r->content}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-submit">
                                                    <input type="hidden" name="review_id" value="{{$check_user_r->id}}">
                                                    <input name="submit" id="submit" class="btn btn-primary submit"
                                                        value="Update" type="submit">
                                                </div>
                                            </form>
                                          </div>
                                        <?php } ?>
                                      </div>
                                      <?php } ?>
                                  </div>
                              </div>
  
                              <div class="tab-pane fade" id="shipping">
                                  <p><strong>Shipping</strong></p>
                                  <p>Lorem Ipsum is simply dummy text of the printing and
                                      typesetting
                                      industry. Lorem Ipsum has been the industry's standard dummy
                                      text
                                      ever since the 1500s, when an unknown printer took a galley
                                      of
                                      type
                                      and scrambled it to make a type specimen book. It has
                                      survived
                                      not
                                      only five centuries, but also the leap into electronic
                                      typesetting,
                                      remaining essentially unchanged. It was popularised in the
                                      1960s
                                      with the release of Letraset sheets containing Lorem Ipsum
                                      passages,
                                      and more recently with desktop publishing software like
                                      Aldus
                                      PageMaker including versions of Lorem Ipsum.</p>
                              </div>
                          </div>
                      </div>
                  </div>
  
                 @if(count($trending)>0)
                  <div class="related-products">
                      <div class="container-custom">
                          <div class="section-header text-center">
                              <h2 class="section-title">Related Products</h2>
                          </div>
                          <div class="products product-carousel with-bg-white">
                              @foreach($trending as $product)
                              <div class="product-item animate__animated animate__fadeInUp">
                                  <div class="product-wrap">
                                      <div class="product-image">
                                          <a class="pro-img" href="{{route('product.detail',$product['slug'])}}">
                                              <?php $l = 0; ?>
                                                @foreach($product['images'] as $img)
                                                    <?php $l++; ?>
                                                         @if($l === 1)
                                                            <img src="<?php echo asset("file/$img->file_name");?>" class="img-responsive" alt="">
                                                        @endif
                                                @endforeach
                                          </a>
                                          <div class="product-label">
                                              <span class="new-title">
                                                @if($product['discount_type'] ==1)
                                                  Sale
                                                @elseif($product['discount_type'] ==2)
                                                  Sale
                                                @else
                                                  New
                                                @endif  
                                              </span>
                                              <span class="sale-title">
                                                  {{$product['discount']}}
                                                    @if($product['discount_type'] ==1)
                                                      %
                                                    @elseif($product['discount_type'] ==2)
                                                      Flat
                                                    @else
                                                    @endif
                                                </span>
                                          </div>
                                          <?php if( Auth::user() ){ 
                                            $check_wish = \App\Models\Wishlist::where('user_id',\Auth::user()->id)->where('product_id',$product['id'])->first(); 
                                            if( $check_wish ){
                                          ?>
                                              <div class="product-action product-wishlist-a">
                                                  <a class="wishlist" href="{{url('remove-from-wishlist')}}/{{$product['id']}}" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist">
                                              <?php }else{ ?>
                                                <div class="product-action">
                                                  <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$product['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                              <?php } ?>
                                          <?php }else{ ?>
                                          <div class="product-action">
                                              <a class="wishlist" href="{{url('add-to-wishlist')}}/{{$product['id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                          <?php } ?>
                                                <i class="fa fa-heart"></i>
                                              </a>
                                              <a href="{{url('single-add-to-cart')}}/{{$product['id']}}" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart">
                                                  <span class="cart-title"><i class="fa fa-shopping-bag"></i></span>
                                              </a>
                                              <a href="{{route('product.detail',$product['slug'])}}" class="quick-view" data-toggle="tooltip"
                                                  data-placement="top" title="Quickview">
                                                  <i class="fa fa-eye"></i>
                                              </a>
                                          </div>
                                      </div>
                                      <div class="product-content">
                                          <h3 class="product-title">
                                              <a href="{{route('product.detail',$product['slug'])}}">{{$product['name']}}</a>
                                          </h3>
                                          <div class="product-price">
                                              <span class="new-price">₹{{$product['single_sales_price']}}</span>
                                              <span class="old-price">₹{{$product['single_mrp_price']}}</span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @endforeach

                              

                          </div>
                      </div>
                  </div>
                  @endif
              </div>
          </div>
      </div>
      
    </section>
 <!--
<div class="container" >
          <ol class="breadcrumb">
              <li><a href="index.html">{{$info['category']}}</a></li>
              <li><a href="category.html">{{$info['sub_category']}}</a></li>
              <li class="active">{{$info['child_category']}}</li>
          </ol>
         <div class="product-detail">
            <div class="row">
                <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-12  ps-silder">
                        <main class='main-wrapper'>
                              <article class='product-details-section'>
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
-->

     @endif
@endsection

@push('scripts')
<!-- <script src="{{url('/')}}/frontend/slider/zoom-slider.js"></script>
<script src="{{url('/')}}/frontend/slider/zoom-slider-main.js"></script> -->
<script>
    let check = false;
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){ 
      check = true;
    }

    
    if( check ){
      $('.is_check_mobile').show();
      $('.is_check_web').hide();
    }else{
      $('.is_check_mobile').hide();
      $('.is_check_web').show();
    }
    //$('.show').zoomImage();
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

    $(document).on('click','.update-rvw-btn', function(e){
      $(this).hide();
      $('.cancel-rvw-btn').show();
      $('.update-review-form').show();
    });

    $(document).on('click','.cancel-rvw-btn', function(e){
      $(this).hide();
      $('.update-rvw-btn').show();
      $('.update-review-form').hide();
    });

    

    $(document).on('click','#color-circle', function(e){
      e.preventDefault();
      var $this = $(this);
      $(document).find('.color-active').attr('class',"cl1 color-deactive");
      $this.removeAttr('class');
      $this.attr('class',"cl1 color-active");
      load_price();
    });

    $(document).on('change','input[name="pa_color"]', function(e){
        var set_this = $(this);
        var color_id = $(this).attr('data-id');
        var size_id = $('.variable-item-size.selected').find('input').attr('data-id');
        var product_id = $('#set_product_id').val();
        var set_url = "{{url('product-variations')}}";
        $.ajax({
            url : set_url,
            type : 'post',
            datatype : 'json',
            data : {color_id : color_id, size_id : size_id, product_id : product_id,_token: "{{ csrf_token() }}",},
            success : function(response){
              console.log(response);
              if( response.data.single_price_quantity == 0 ){
                alert('Out of stock!');
              }else{
                $('.product-meta-code .available').html(response.data.single_price_quantity);
                $('.single_product-price .new-price').html('₹'+response.data.single_sales_price);
                $('.single_product-price .old-price').html('₹'+response.data.single_price);
                $('.quantity-group input#quantity').val(1);
                $('.quantity-group input#quantity').attr('maxlength',response.data.single_price_quantity);
                var set_single_img = '';
                if( response.data.pro_images.length ){
                  $('.product-gallery-slider').slick('destroy');
                  $('.product-gallery-thumbs').slick('destroy');
                  $('.product-gallery-slider').html('');
                  $('.product-gallery-thumbs').html('');
                  var set_html = '';
                  var set_html_thumb = '';
                  $(response.data.pro_images).each(function(iI,vI){
                    if( iI == 0 ){
                      set_single_img = vI.file_name;
                    }
                    set_html += '<div class="product-gallery-image">';
                    set_html += '<div class="show" href="{{asset('file')}}/'+vI.file_name+'">';
                    set_html += '<img id="show-img" class="show-img" src="{{asset('file')}}/'+vI.file_name+'" class="show-small-img" alt="" style="max-height: 750px;">';
                    set_html += '</div>';
                    set_html += '</div>';
                    set_html_thumb += '<li><img src="{{asset('file')}}/'+vI.file_name+'" alt="" style="height: 100px;"></li>';
                  });
                  $('.product-gallery-slider').html(set_html);
                  $('.product-gallery-thumbs').html(set_html_thumb);
                    
                  $('.product-gallery-slider').slick({
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      arrows: false,
                      fade: true,
                      cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
                      touchThreshold: 100,
                      pauseOnHover: false,
                      touchMove: false,
                      draggable: false,
                      autoplay: false,
                      pauseOnHover: true,
                      asNavFor: '.product-gallery-thumbs'
                  });
                  $('.product-gallery-thumbs').slick({
                      slidesToShow: 5,
                      slidesToScroll: 1,
                      asNavFor: '.product-gallery-slider',
                      dots: false,
                      arrows: false,
                      focusOnSelect: true
                  });

                  //$('.show').zoomImage();

                }
                $('.variable-item-color').removeClass('selected');
                set_this.parent().addClass('selected');
                $('#set_product_price').val(response.data.single_sales_price);
                $('#set_product_color').val(color_id);
                $('#set_product_size').val(size_id);
                $('#set_product_image').val(set_single_img);
              }
            },
            error : function(err){
              alert('No response from server');
            }
        });
    });
    

    $(document).on('click','#pincode-check', function(e){
      console.log($('#pincode-input').val().length);
        if( $('#pincode-input').val().length == 6 ){
          var set_url = "{{url('check-availability')}}";
          var pin_code = $('#pincode-input').val();
          $.ajax({
              url : set_url,
              type : 'post',
              datatype : 'json',
              data : {pin_code : pin_code,_token: "{{ csrf_token() }}",},
              success : function(response){
                if(response.code == 301){
                  toastr.success(response.message);
                  $('#pincode-error').hide();
                  $('#pincode-success').show();
                }else{
                  toastr.error(response.message);
                  $('#pincode-error').show();
                  $('#pincode-success').hide();
                }
              },
              error : function(err){
                toastr.error("No response from server");
              }
          });
        }else{
          toastr.error("You enter wrong pin code!");
        }
    });

    $(document).on('change','input[name="pa_size"]', function(e){
        set_this = $(this);
        var size_id = $(this).attr('data-id');
        var color_id = $('.variable-item-color.selected').find('input').attr('data-id');
        var product_id = $('#set_product_id').val();
        var set_url = "{{url('product-variations')}}";
        $.ajax({
            url : set_url,
            type : 'post',
            datatype : 'json',
            data : {color_id : color_id, size_id : size_id, product_id : product_id,_token: "{{ csrf_token() }}",},
            success : function(response){
              console.log(response);
              if( response.data.single_price_quantity == 0 ){
                alert('Out of stock!');
              }else{
                $('.product-meta-code .available').html(response.data.single_price_quantity);
                $('.single_product-price .new-price').html('₹'+response.data.single_sales_price);
                $('.single_product-price .old-price').html('₹'+response.data.single_price);
                $('.quantity-group input#quantity').val(1);
                $('.quantity-group input#quantity').attr('maxlength',response.data.single_price_quantity);
                $('.variable-item-size').removeClass('selected');
                set_this.parent().addClass('selected');
                $('#set_product_price').val(response.data.single_sales_price);
                $('#set_product_color').val(color_id);
                $('#set_product_size').val(size_id);
              }
            },
            error : function(err){
              alert('No response from server');
            }
        });

      
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
