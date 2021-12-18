@extends('frontend.layouts.app')

@push('styles')
@endpush


@section('content')
<!-- Coupon code Modal start  -->
<div class="modal fade" id="couponcodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog couponcode-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none;">
         <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body coupon-code-model">
         <div class="col-md-12">
         <p>Apply Coupon</p>
         <input type="text" class="form-control coupon-form-control" placeholder="enter coupon code here" id="coupon-code"/>
         <button type="button" class="btn btn-pink f_size13" id="apply-coupon" style="margin-top:-4px;">Apply</button>
        </div>
        </div>
        <div class="clear"></div>
        <div class="modal-footer" style="border-top:none; text-align:center !important; ">

        </div>
      </div>
    </div>
  </div>
  <!-- Coupon code Modal start  -->
  <!-- Add Message Modal start  -->
  <div class="modal fade" id="address_message_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         <h4 class="modal-title" id="exampleModalLabel">Add a Peronalized message </h4>

        </div>
        <div class="modal-body coupon-code-model">
         <div class="col-lg-12 col-md-12 mx-auto address-form form-message ">
         <ul>

      <li><label>Recipient Name</label><input type="text" placeholder="Dear" class="form-control" ></li>
       <li><label>Message</label><textarea class="form-control" rows="3" cols="10" style="resize: none;"></textarea></li>
        <li><label>Sender Name</label><input type="text" placeholder="Dear" class="form-control" ></li>

    </ul>
        </div>
        </div>
        <div class="modal-footer" style="border-top:none;">
          <button type="button" class="btn btn-secondary f_size13" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success f_size13">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Add Message end  -->
  <div class="container">
    <div class="col-md-12 col-sm-12 cart-page-heading"><h2>MY BAG <span class="cart-count">({{count($carts)}} item)</span></h2></div>
      <!--Cart Left section start here-->
      <div class="col-md-8 col-sm-12 cartpage-lft">

      <div class="col-md-12 col-sm-12 itembox padlr0">
        {{-- start list item --}}
        @if(\Session::has('cart'))
        <?php $total = 0; $discount = 0;?>
        @foreach(session()->get('cart') as $cart)
        <?php
         $total += $total + ($cart['qty'] * $cart['single_price']);
         $discount +=  $discount + ($cart['single_price'] -$cart['single_sales_price']);
        ?>
        <div class="list-item">
            <div class="row">
                <div class="col-md-3 col-sm-12 ">
                    <img src="{{asset('file')}}/{{$cart['product_images'][0]}}" class="img-responsive thumbimg" alt="" style="height : 180px;">
                </div>
                <div class="col-md-9 col-sm-12">
                    <div class="row">

                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 mx-4">
                          <div class="heading-title">
                             <?php $product = \App\Models\Product::where('id', $cart['product_id'])->first(); ?>
                             {{$product->category->name}}
                             <br>
                             <p>{{$cart['name']}}</p>
                          </div>
                          <ul class="cart-product-detail">
                            <li>
                                <span>Size</span>
                                <select class="form-control select-wid100" id="cart-size" data-id="{{$cart['id']}}" data-product="pro-{{$cart['product_id']}}">
                                    <?php
                                        $dsizes = [];
                                        $sizes = \App\Models\Size::all();
                                    ?>
                                    @foreach($product->productProductVariations as $variation)
                                       <?php
                                         array_push($dsizes, $variation->size_id);
                                       ?>
                                    @endforeach
                                    <?php $fsizes = array_unique($dsizes); ?>
                                    @foreach($sizes as $size)
                                     @foreach($fsizes as $fsize)
                                       @if($size->id === $fsize)
                                        <option value="{{$size->id}}"
                                            @if($size->id == $cart['size_id'])
                                            selected
                                            @endif>{{$size->name}}
                                        </option>
                                       @endif
                                     @endforeach
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <span>Color</span>

                                <?php
                                  $colors = App\Models\Color::all();
                                  foreach ($colors as $color) {
                                     if($color->id == $cart['color_id']){
                                        echo '<span class="cart-color" data-id="'.$color->id.'" data-product="pro-'.$cart['product_id'].'" id="color-'.$cart['product_id'].'">';
                                         echo $color->name;
                                        echo "</span>";
                                     }
                                  }
                                ?>

                            </li>
                            <li>
                                <span class="qty-txt">Qty</span>
                                <button type="button" class="btn-circle" id="cart-substract" data-id="{{$cart['id']}}" data-product="pro-{{$cart['product_id']}}">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="text" value="{{$cart['qty']}}" class="form-control qty-input" id="cart-qty">
                                <button type="button" class="btn-circle" id="cart-add" data-id="{{$cart['id']}}" data-product="pro-{{$cart['product_id']}}">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </li>
                            <li>
                                <a href="#" class="btn btn-pink">View Detail</a>
                                <button type="button" class="btn-remove">
                                    <i class="fas fa-trash-alt"></i>
                                    Remove
                                </button>
                                <button type="button" class="btn-wishlist">
                                    <i class="fas fa-heart"></i> Save to wishlist
                                </button>
                            </li>
                          </ul>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-right       padtop15">
                            <div class="pricetxt">Unit Price:
                                <i class="fas fa-rupee-sign"></i><span class="cart-price" data-product="pro-{{$cart['product_id']}}">{{$cart['single_sales_price']}}</span><br>
                                <div class="txtreview">
                                    <i class="far fa-calendar-alt"></i> {{date('d M Y', strtotime($cart['created_at']))}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           <div class="col-lg-12 item-bot-strip"><div class="addmessage-txt"><button type="button" data-toggle="modal" data-target="#address_message_Modal"><i class="fas fa-gift"></i> Gift Wrap</button> <button type="button" data-toggle="modal" data-target="#address_message_Modal">Add Message</button></div></div>
        </div>
        @endforeach
        @endif
        {{-- end list item --}}
      </div>


        </div>
        <!--Cart Left section end here-->

          <!--Cart Right Start here-->
          <div class="col-md-4 col-sm-12">
            <div class="cart-rgt-panel">
            <div class="coupon-text"><button type="button" class="btn" data-toggle="modal" data-target="#couponcodeModal"><i class="fas fa-tags"></i> Apply Coupon Code</button></div>
            <div class="cart-order-summary">
              <h4>Order Summary</h4>
              <ul>
                <li>Bag Total <span><i class="fas fa-rupee-sign"></i> {{$total}}</span></li>
                <li>Discount <span><i class="fas fa-rupee-sign"></i> {{$discount}}</span></li>
                <li>Subtotal <span><i class="fas fa-rupee-sign"></i> <span class="sub-total">{{$total - $discount}}</span></span></li>
                 <li>Coupon Discount <span class="txtorange boldtxt" id="coupon-discount">Apply Coupon</span></li>
                  <li>Delivery Charges  <span class="txtorange">Free</span></li>
                   <li><strong class="boldtxt">Final Order Amount</strong>  <span class="boldtxt"><i class="fas fa-rupee-sign"></i>
                    <span id="final-amount">
                    {{$total - $discount}}
                    </span>
                   </span></li>
                   <li><button class="btn pinkBtn btn-checkout">Place Order</button> <button class="btn btn-secondary btn-checkout">Continue Shopping</button></li>
                   <li><div style="display:inline-block; width:auto; margin-right:10px;">We Accept</div><div style="display:inline-block; width:auto;"><img src="{{asset('frontend/images/ARP3454.jpg')}}" alt="" width="230"  /></div></li>
              </ul>
            </div>
          </div>
          </div>
          <!--Cart Right end here-->

  </div>
  <!--Vasvi Exclusive Slider Start here-->
  <section class="colorfulbg">
    <div class="col-md-12 text-center heading-title">
                        <h2 class="title-txt">Recently Viewed</h2>
                        <img src="{{asset('frontend/images/headline.png')}}">
              </div>
        <div class="exclusive-bg"></div>

    <div style="padding-top:60px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home-product vasvi_exclusive_slider">

                        <div class="owl-carousel owl-theme home-product-slider">
                            <div class="item">
                                    <div class="product-card">
                                    <div>
                                        <div id="f1_container">
                                                <div id="f1_card" class="shadow">
                                                    <div class="front face">
                                                        <img src="{{asset('frontend/images/ARP3454.jpg')}}" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="back face center">
                                                        <img src="{{asset('frontend/images/ARP3454.jpg')}}" class="img-responsive" alt="">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p>
                                    <p> <span class="price-txt">Rs.1000</span> <span class="price-oveline">Rs.250</span> <span class="discount-text">30%</span></p>
                                    </div>
                                     <div class="caption-hover">
                                          <span class="circle-size"  >
                                            <p>Select Size <span  class="btn-close float-right">X</span></p>
                                            <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                          <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                          <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p></div>
                                          <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>

                                  </div>
                            </div>

                            <div class="item">
                                    <div class="product-card">
                                    <div>
                                        <div id="f1_container">
                                                <div id="f1_card" class="shadow">
                                                    <div class="front face">
                                                        <img src="{{asset('frontend/images/ARP3512.jpg')}}" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="back face center">
                                                        <img src="{{asset('frontend/images/ARP3511.jpg')}}" class="img-responsive" alt="">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p>
                                    <p> <span class="price-txt">Rs.1000</span> <span class="price-oveline">Rs.250</span> <span class="discount-text">30%</span></p>
                                    </div>
                                     <div class="caption-hover">
                                          <span class="circle-size"  >
                                            <p>Select Size <span  class="btn-close float-right">X</span></p>
                                            <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                          <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                          <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p></div>
                                          <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>

                                  </div>
                            </div>

                            <div class="item">
                                    <div class="product-card">
                                    <div>
                                        <div id="f1_container">
                                                <div id="f1_card" class="shadow">
                                                    <div class="front face">
                                                        <img src="{{asset('frontend/images/ARP3552.jpg')}}" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="back face center">
                                                        <img src="{{asset('frontend/images/ARP3551.jpg')}}" class="img-responsive" alt="">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p>
                                    <p> <span class="price-txt">Rs.1000</span> <span class="price-oveline">Rs.250</span> <span class="discount-text">30%</span></p>
                                    </div>
                                     <div class="caption-hover">
                                          <span class="circle-size"  >
                                            <p>Select Size <span  class="btn-close float-right">X</span></p>
                                            <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                          <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                          <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p></div>
                                          <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>

                                  </div>
                            </div>


                            <div class="item">
                                    <div class="product-card">
                                    <div>
                                        <div id="f1_container">
                                                <div id="f1_card" class="shadow">
                                                    <div class="front face">
                                                        <img src="{{asset('frontend/images/ARP3566.jpg')}}" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="back face center">
                                                        <img src="{{asset('frontend/images/ARP3563.jpg')}}" class="img-responsive" alt="">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p>
                                    <p> <span class="price-txt">Rs.1000</span> <span class="price-oveline">Rs.250</span> <span class="discount-text">30%</span></p>
                                    </div>
                                     <div class="caption-hover">
                                          <span class="circle-size"  >
                                            <p>Select Size <span  class="btn-close float-right">X</span></p>
                                            <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                          <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                          <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p></div>
                                          <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>

                                  </div>
                            </div>

                            <div class="item">
                                    <div class="product-card">
                                    <div>
                                        <div id="f1_container">
                                                <div id="f1_card" class="shadow">
                                                    <div class="front face">
                                                        <img src="{{asset('frontend/images/ARP3605.jpg')}}" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="back face center">
                                                        <img src="{{asset('frontend/images/ARP3604.jpg')}}" class="img-responsive" alt="">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p>
                                    <p> <span class="price-txt">Rs.1000</span> <span class="price-oveline">Rs.250</span> <span class="discount-text">30%</span></p>
                                    </div>
                                     <div class="caption-hover">
                                          <span class="circle-size"  >
                                            <p>Select Size <span  class="btn-close float-right">X</span></p>
                                            <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                          <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                          <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p></div>
                                          <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>

                                  </div>
                            </div>

                            <div class="item">
                                    <div class="product-card">
                                    <div>
                                        <div id="f1_container">
                                                <div id="f1_card" class="shadow">
                                                    <div class="front face">
                                                        <img src="{{asset('frontend/images/ARP3525.jpg')}}" class="img-responsive" alt="">
                                                    </div>
                                                    <div class="back face center">
                                                        <img src="{{asset('frontend/images/ARP3624.jpg')}}" class="img-responsive" alt="">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p>
                                    <p> <span class="price-txt">Rs.1000</span> <span class="price-oveline">Rs.250</span> <span class="discount-text">30%</span></p>
                                    </div>
                                     <div class="caption-hover">
                                          <span class="circle-size"  >
                                            <p>Select Size <span  class="btn-close float-right">X</span></p>
                                            <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                          <div class="btn-section"><a href="#" class="pinkBtn">Add To Cart</a> <a href="javascript:void(0)" class="pinkBtn btnbuynow">Buy Now</a></div>
                                          <div class="text-caption"><p><strong>Kurty</strong> Dry Woven Team Training</p></div>
                                          <span class="size"> <a href="#">S</a><a href="#">M</a><a href="#">XL</a> <a href="#">XXL</a></span>
                                    </div>
                                    <div class="icon-wishlist"><button type="button"  data-toggle="tooltip" data-placement="left" title="Save for Later"><i class="fas fa-heart"></i></button> </div>

                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </section>
 <!--Vasvi Exclusive Slider end here-->
@endsection


@push('scripts')
<script>
    var final_amount = $(document).find('#final-amount').html();
    $(document).on('click','#apply-coupon', function(){
        var coupon = $(document).find('#coupon-code').val();
        var total = $(document).find('.sub-total').html();

        var sub_amount = $(document).find('.sub-amount').html();
        var error = false;
        if(coupon === ''){
            toastr.warning('Warning', 'Please enter Coupon Code',{
                            positionClass: 'toast-top-center',
            });
        }
        else{
            $.ajax({
                url: '{{ route('apply.coupon') }}',
                method: "post",
                data : {coupon : coupon, amount : total, _token : '{{ csrf_token() }}' },
                success: function (response) {
                  if(response.code === 200){
                      console.log(final_amount);
                      console.log(response.coupon_price);
                    $(document).find('#coupon-discount').html(response.coupon_price);
                    $(document).find('#final-amount').html(parseInt(final_amount) - parseInt(response.coupon_price));
                    toastr.success('Success', response.message,{
                            positionClass: 'toast-top-center',
                    });
                  }
                  else{
                    toastr.warning('Warning', response.message,{
                            positionClass: 'toast-top-center',
                    });
                  }
                },
                error : function(err){

                }
            });
        }
    });

    $(document).on('click','#cart-add', function(){
       var id = $(this).attr('data-id');
       var count = $(document).find('#cart-qty').val();
       var data_pro = $(this).attr('data-product');
       var product_id = data_pro.split('pro-')[1];
       var color_id = $(document).find('#color-'+product_id).attr('data-id');
       count = parseInt(count) + 1;
       cart_update(id, 0 , count,product_id, color_id);
       $(document).find('#cart-qty').val(count++);

    });

    $(document).on('click','#cart-substract', function(){
       var id = $(this).attr('data-id');
       var count = $(document).find('#cart-qty').val();
       var data_pro = $(this).attr('data-product');
       var product_id = data_pro.split('pro-')[1];
       var color_id = $(document).find('#color-'+product_id).attr('data-id');

       count = parseInt(count) > 1   ? parseInt(count) - 1 : 1;
       cart_update(id, 0 , count,product_id, color_id);
       $(document).find('#cart-qty').val(count);
    });

    $(document).on('change','#cart-size', function(){
        var id = $(this).attr('data-id');
        var size = $(this).val();
        var data_pro = $(this).attr('data-product');
        var product_id = data_pro.split('pro-')[1];
        var color_id = $(document).find('#color-'+product_id).attr('data-id');
        cart_update(id, size , 0,product_id, color_id);
    });

    function cart_update(id,size, qty, product_id, color_id ){
        console.log('ID-'+id+'  ' + 'Size - ' + size + '  ' + 'Qty - ' + qty + 'Product Id - '+product_id + '  ' + 'Color Id - ' + color_id);
        var url = qty === 0 ? '{{ route('cart.size') }}' : '{{ route('cart.qty') }}';
        $.ajax({
                url: url,
                method: "post",
                data : {id : id, size : size,qty : qty,product_id : product_id,color_id : color_id, _token : '{{ csrf_token() }}' },
                success: function (response) {
                    var carts = response.carts;
                    var count  = response.count;
                    $(document).find('.cart-count').html(count);

                    toastr.success('Success', response.message,{
                            positionClass: 'toast-top-center',
                    });
                },
                error : function(err){
                    toastr.error('Error', 'Internal server error',{
                            positionClass: 'toast-top-center',
                    });
                }
        });
    }
</script>
@endpush
