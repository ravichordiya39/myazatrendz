@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')
	<?php
    $subtotal_c = 0;
    $total_c = 0;
  ?>
  <style>
    .discount_section{
      display: none;
    }
    .remove_coupon_section .remove_item{
      color: #004e96;
      float: right;
      cursor: pointer;
    }
    .remove_coupon_section{
      display: none;
    }
  </style>
	<section class="site-content">
      <div class="page-banner-section">
        <div class="page-banner page-banner-bg">
          <div class="container">
            <div class="page-banner-wrap">
              <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                <ul class="breadcrumb-items">
                  <li class="breadcrumb-item trail-begin"><a href="{{url('/')}}" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Cart</span></li>
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
            <h1 class="page-title">Cart</h1>
          </div>
          <div class="row">
            <div class="content-area col-12">
              <div class="content-section">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-12">
                    <div class="cart-form-wrapper">
                      <!-- <div class="alert alert-warning" role="alert">
                        Minimum Order Amount is ₹1000.00
                      </div>
                      <div class="alert alert-success" role="alert">
                        Checkout now and earn <strong>170 Reward Points </strong>for this order
                      </div> -->
                      @if( !empty( $cart_data ) )
                      <form class="cart-form" action="{{url('update-cart-page')}}" method="post">
                        @csrf
                        <div class="cart-items">
                          @foreach( $cart_data as $key => $single_cart_data )
                          @php
                            $product_detail = \App\Models\Product::where('id',$single_cart_data['product_id'])->first();

                            $product_variation_detail = \App\Models\ProductVariation::where('product_id',$single_cart_data['product_id'])->where('color_id',$single_cart_data['product_color'])->where('size_id',$single_cart_data['product_size'])->first();

                            $total_product_price = ( $single_cart_data['product_quantity'] * $single_cart_data['product_price'] );
                            $subtotal_c = $subtotal_c + $total_product_price;
                          @endphp
                          <div class="cart-item">
                            <div class="cart-wrap">
                              <div class="cart-image" style="position: unset;">
                                <a href="{{url('product')}}/{{$product_detail->slug}}"><img src="{{asset('file')}}/{{$single_cart_data['product_image']}}"></a>
                              </div>
                              <div class="cart-desc">
                                <p class="cart-title"><a href="{{url('product')}}/{{$product_detail->slug}}">{{$single_cart_data['product_name']}}</a></p>
                                <p class="cart-meta"><span>Product Code : {{$product_detail->sku_code}}</span></p>
                                <p class="cart-price price">
                                  <span class="new-price">₹{{$single_cart_data['product_price']}}</span>
                                </p>
                                <div class="cart-quantity">
                                  <div class="quantity-group">
                                    <a href="javascript:void(0)" class="dec qty-btn"></a>
                                    <input type="text" id="quantity" class="input-text qty" name="quantity[]" value="{{$single_cart_data['product_quantity']}}" minlength="1" maxlength="{{$product_variation_detail->single_price_quantity}}">
                                    <a href="javascript:void(0)" class="inc qty-btn"></a>
                                  </div>
                                  <p class="cart-subtotal"><span class="price">₹{{$total_product_price}}</span></p>
                                </div>
                              </div>
                              <div class="cart-action">
                                <div class="cart-action-button">

                                  <!-- <a href="#" class="add-to-wishlist" tabindex="-1"><i
                                      class="far fa-heart"></i><span>Add to Wishlist</span></a> -->

                                  <?php if( Auth::user() ){ 
                                    $check_wish = \App\Models\Wishlist::where('user_id',\Auth::user()->id)->where('product_id',$single_cart_data['product_id'])->first(); 
                                    if( $check_wish ){
                                  ?>
                                          <a class="add_to_wishlist single_add_to_wishlist" href="{{url('remove-from-wishlist')}}/{{$single_cart_data['product_id']}}" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist">
                                            <i class="fas fa-heart"></i> <span>Remove From Wishlist</span>
                                          </a>
                                      <?php }else{ ?>
                                          <a class="add_to_wishlist single_add_to_wishlist" href="{{url('add-to-wishlist')}}/{{$single_cart_data['product_id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                            <i class="far fa-heart"></i> <span>Add to  Wishlist</span>
                                          </a>
                                      <?php } ?>
                                  <?php }else{ ?>
                                      <a class="add_to_wishlist single_add_to_wishlist" href="{{url('add-to-wishlist')}}/{{$single_cart_data['product_id']}}" data-toggle="tooltip" data-placement="top" title="Add To Wishlist">
                                        <i class="far fa-heart"></i> <span>Add to  Wishlist</span>
                                      </a>
                                  <?php } ?>

                                  <a href="javascript:void(0);" class="remove-item remove_from_cart_button" title="Remove this item" data-product_color="{{$single_cart_data['product_color']}}" data-product_size="{{$single_cart_data['product_size']}}" data-product_id="{{$single_cart_data['product_id']}}">
                                    <i class="far fa-trash-alt"></i><span>Remove</span>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="product_id[]" value="{{$single_cart_data['product_id']}}">
                          <input type="hidden" name="product_color[]" value="{{$single_cart_data['product_color']}}">
                          <input type="hidden" name="product_size[]" value="{{$single_cart_data['product_size']}}">
                          @endforeach
                        </div>
                        
                        <div class="cart-update">
                          <div class="cart-continue-shopping ">
                            <a href="{{url('/')}}" class="btn btn-outline-primary"> Continue Shopping </a>
                          </div>
                          <div class="cart-update-btn">
                            <!-- <button type="submit" class="btn btn-primary">Cart2PDF</button> -->
                            <button type="submit" name="update_cart_action" value="update_qty" class="btn btn-primary action update">Update Shopping Cart</button>
                        </div>
                        </div>

                      </form>
                      @else
                        <div>
                          <h4>Cart Empty</h4>
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-8 col-12">
                    <div class="cart-collaterals">
                      @if( !empty( $cart_data ) )
                      <?php
                        $total_c = $subtotal_c;
                        $set_style = '';
                        $set_style_r = '';
                        $set_style_d = '';
                        $set_discount_price = '';
                        $coupon_id = '';
                          if( !empty($applied_cart) ){
                            $set_style = 'display:none;';
                            $set_style_r = 'display:block;';
                            $set_style_d = 'display:table-row;';
                            $coupon_id = $applied_cart->id;
                            if( $applied_cart->discount_type == 1 ){
                                $set_discount_price = $total_c - $applied_cart->value;
                            }else{
                                $set_dis = ($applied_cart->value / 100) * $total_c;

                                if( $set_dis >= $applied_cart->max_discount ){
                                    $set_discount_price = $applied_cart->max_discount;
                                }else{
                                    $set_discount_price = $set_dis;
                                }
                            }
                            $total_c = $total_c - $set_discount_price;
                          }else{

                          }

                      ?>
                      <div class="coupon apply_coupon_section" style="{{$set_style}}">
                        <label for="coupon_code_p">Apply Coupon Code</label>
                        <div class="coupon-group">
                          <input type="text" class="input-text" id="coupon_code_p" placeholder="Coupon code">
                          <button type="button" class="button apply_coupon_btn" value="Apply coupon">Apply</button>
                        </div>
                      </div>
                      <div class="coupon remove_coupon_section" style="<?= $set_style_r ?>">
                        <?php if( !empty($applied_cart) ){ ?>
                          <p><span class="decrp_coup"><?php echo $applied_cart->coupon_name.' Appiled'; ?></span><span class="remove_item">Remove</span></p>
                        <?php }else{ ?>
                          <p><span class="decrp_coup"></span><span class="remove_item">Remove</span></p>
                        <?php } ?>
                        
                      </div>
                      <input type="hidden" id="set_coupon_id" value="{{$coupon_id}}">
                      @endif
                      
                      <div class="cart-totals">
                        <h2>Cart totals</h2>
                        <div class="cart-totals-table">
                          <table class="shop-table" cellspacing="0">
                            <tbody>
                              <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td data-title="Subtotal"> <span class="price p_sub_total_price">₹{{$subtotal_c}}</span> </td>
                              </tr>
                              <tr class="discount-totals discount_section" style="{{$set_style_d}}">
                                <th>Discount</th>
                                <td data-title="Discount"><strong><span class="price p_discount_price">@if(!empty($set_discount_price))<?php echo '₹'.$set_discount_price ?>@endif</span></strong></td>
                              </tr>
                              <tr class="order-total">
                                <th>Total</th>
                                <td data-title="Total"><strong><span class="price p_total_price">₹{{$total_c}}</span></strong> </td>
                                <input type="hidden" id="cart_sub_total" value="{{$subtotal_c}}">
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="proceed-to-checkout">
                            <form method="get" action={{route('checkout')}}>
                                @csrf
                                <input type="hidden" name="coupon_val" id="coupon-val" value="" />
                                <input type="hidden" name="coupon" id="coupon-name" value="" />
                                @if( Auth::user() )
                                  <button class="checkout-button button" type="submit">Place Order</button>
                                @else
                                  <button class="checkout-button button" type="button" data-toggle="modal" data-target="#loginregister">Place Order</button>
                                @endif
                                
                            </form>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--content-area-->
          </div>
          <!--row-->
        </div>
        <!--content-wrapper -->
      </div>
      <!--container-->
    </section>

@endsection

@push('scripts')

<script>
  $(document).on('click','.apply_coupon_btn', function(e){
      if( $('#coupon_code_p').val() == '' ){
        toastr.error("Please enter coupon code.");
      }else{
        var set_url = "{{url('apply-coupon')}}";
        var coupon_code = $('#coupon_code_p').val();
        var sub_total = $('#cart_sub_total').val();
        $.ajax({
            url : set_url,
            type : 'post',
            datatype : 'json',
            data : {coupon_code : coupon_code,sub_total : sub_total,_token: "{{ csrf_token() }}",},
            success : function(response){
              if( response.success == false ){
                toastr.error(response.message);
              }else{
                console.log(response);
                $('.remove_coupon_section').show();
                $('.apply_coupon_section').hide();
                $('.remove_coupon_section .decrp_coup').html(response.data.coupon);
                $('.discount_section').show();
                $('.p_discount_price').html('₹'+response.data.set_discount_price);
                $('.p_total_price').html('₹'+response.data.set_total_amount);
                $('#set_coupon_id').val(response.data.coupon_id);
                toastr.success(response.message);
              }
            },
            error : function(err){
              toastr.error("No response from server");
            }
        });
      }
  });
  
  $(document).on('click','.remove_coupon_section .remove_item', function(e){
    var set_url = "{{url('remove-coupon')}}";
    var coupon_id = $('#set_coupon_id').val();
    $.ajax({
        url : set_url,
        type : 'post',
        datatype : 'json',
        data : {coupon_id : coupon_id,_token: "{{ csrf_token() }}",},
        success : function(response){
            $('.remove_coupon_section').hide();
            $('.apply_coupon_section').show();
            $('.remove_coupon_section .decrp_coup').html('');
            $('.discount_section').hide();
            $('.p_discount_price').html('');
            $('.p_total_price').html('₹'+$('#cart_sub_total').val());
            $('#set_coupon_id').val('');
            toastr.success('Coupon removed successfully.');
        },
        error : function(err){
          toastr.error("No response from server");
        }
    });
    
  });
</script>

@endpush