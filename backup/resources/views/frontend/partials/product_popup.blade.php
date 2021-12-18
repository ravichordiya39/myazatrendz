<html lang="en">
   <head>
      <title></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="vasvi shop project">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="ML3K4olJlG0W7bMXi9QjGkYTdIm647IMUaj9H8ap" />
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/bootstrap.min-3.3.7.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/menu.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/style-new.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/fontawesome-all.min.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/front-new.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/front-new2.css">
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/frontend/css/zoom-slider.css">
      <link rel="stylesheet" type="text/css" href="https://localhost/toast/toastr.css">
   </head>
   <body>



<div class="row">
    <div class="col-lg-6">
       <div class="row">
          <div class="col-md-12">
             <main class='main-wrapper'>
                   <article class='product-details-section'>
                      <section>
                         <div class="small-img">
                            <img src="{{asset('front_assets/images/online_icon_right@2x.png')}}" class="icon-left" alt="" id="prev-img">
                            <div class="small-container">
                               <div id="small-img-roll">
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
                                    {{dd($iterator)}}
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
                                  {{dd($avail_colors)}}
                               </div>
                            </div>
                            <img src="{{asset('front_assets/images/online_icon_right@2x1.png')}}" class="icon-right" alt="" id="next-img">
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
    <div class="col-lg-6 quick_right">
        <h2 class="dmy-pro-name">{{$info['name']}}</h2>
        <p>{!!substr($info['description'], 0, 170)!!}
        </p>
        <small>SKU - {{$info['sku']}}</small>
        <br>

        <div class="text-price-title">Offer Price</div>
        <div class="product-price">
            <span class="bold-price">
                <i class="fas fa-rupee-sign" style="font-size:18px;"></i>
                <span class="dsale-price">{{$single_sales_price}}</span>
            </span>
            <span class="cut-price">
                <i class="fas fa-rupee-sign" style="font-size:14px;"></i>
                <span class="dmrp-price">{{$single_price}}</span>
            </span>
            <span class="text-success txt-discount">
             @if($info['discount_type'] === 1)
                {{$info['discount']}}%
             @else
               {{$info['discount']}} &nbsp; Flat
             @endif
           </span>
        </div>

        <div class="row">
          <div class="col-md-12">
             <div class="product-size">
                <ul>
                  <?php
                    $array = array_unique($avail_size);
                    $sizes = \App\Models\Size::all();
                  ?>
                        <li class="boldtxt">Size</li>
                   @foreach($array as $dsize)
                     @foreach($sizes as $size)
                       @if($size->id === $dsize)
                         <li ><a href="#" id="dsize-circle"
                            @foreach($info['variations'] as $var)
                                @if($var->size_id == $dsize)
                                @if($var->size_status !== 1)
                                class="disabled"
                                @elseif($var->primary_variation === 1)
                                class="dsize-active"
                                @else
                                class="dsize-deactive"
                                @endif
                                data-id="{{$var->size_id}}"
                                @endif
                            @endforeach
                            >{{$size->name}}</a>
                         </li>
                       @endif
                     @endforeach
                   @endforeach
                </ul>
             </div>
             <div class="product-color">
                <ul>
                  <?php
                    $arrays = array_unique($avail_colors);
                    $colors = \App\Models\Color::all();
                  ?>

                   <li class="boldtxt">Color</li>
                   <div class="color-scale">
                      <ul>
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
                                        class="cl1 dcolor-active"
                                        @else
                                        class="cl1 dcolor-deactive"
                                        @endif
                                        data-id="{{$var->color_id}}"
                                        data-count="{{$ccount}}"
                                    @endif
                                @endforeach
                                 style="background-color : {{$color->value}};" id="dcolor-circle"><a href="#"></a></li>
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
                         <button type="button" class="btn   btn-number" style="background:#ed6388;" data-type="minus" data-field="quant[2]" id="dminus">
                         <span class="glyphicon glyphicon-minus" ></span>
                         </button>
                         </span>
                         <input type="text" name="quant[2]" id="dquantity-pro" class="form-control input-number" value="{{$qty}}" min="1" max="100">
                         <span class="input-group-btn">
                         <button type="button" class="btn   btn-number" style="background:#ed6388;" data-type="plus" data-field="quant[2]" id="dplus">
                         <span class="glyphicon glyphicon-plus"></span>
                         </button>
                         </span>
                      </div>
                   </div>
                   <div class="col-md-3">
                       <button type="button" class="btn-wishlist" id="btn-wishlist" data-id="{{$info['id']}}"> <i class="fa fa-heart" aria-hidden="true"></i></button>
                       <button id="share_icons" class="btn-wishlist" type="button" data-id="{{$info['id']}}"> <i class="fas fa-share-alt"></i></button>

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

             <div class="row authentic-product-row"  >
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
              <div>
                <button type="button" class="btn-addcart" id="dbtn-addcart">Add to Cart</button>
                 <a href="{{url('product')}}/{{$info['slug']}}" class="btn btn-buynow" >More Details ></a>
             </div>
          </div>
       </div>
    </div>
</div>

   </body>
</html>
