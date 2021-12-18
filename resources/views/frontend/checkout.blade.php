@extends('frontend.layouts.app')

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
  <!--=====================================================
                            Header Section End
    =========================================================-->
    <section class="site-content">
      <div class="page-banner-section">
        <div class="page-banner page-banner-bg">
          <div class="container">
            <div class="page-banner-wrap">
              <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                <ul class="breadcrumb-items">
                  <li class="breadcrumb-item trail-begin"><a href="{{ ('/') }}" rel="home"><span
                        itemprop="name">Home</span></a></li>
                  <li class="breadcrumb-item trail-end"><span itemprop="name">Checkout</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
		   
						<?php $product_final_price=0; ?>
							@foreach($carts_data as $product_data)
					
							<?php 	$product_price = $product_data->product_quantity * $product_data->product_price;		
									$product_final_price = $product_final_price + $product_price;
							?>
							@endforeach
      <!-- page-banner-section -->
      <div class="container">
        <div class="content-wrapper">
          <div class="page-header text-center">
            <h1 class="page-title">Checkout</h1>
          </div>
          <div class="row">
            <div class="content-area col-12">
              <div class="content-section">
                <div class="row flex-row-reverse">
                  <div class="col-lg-4 col-md-12 col-12">
                    <div class="checkout-collaterals">

                      <?php
                        $total_c = $product_final_price;
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
                                      
                      <div class="checkout-totals">
                        <div class="order-table-wrapper">
                          <table class="shop-table checkout-totals-table">
                            <tbody>
                              <tr class="cart-subtotal">
                                <td>Subtotal</td>
                                <td class="text-right"><span class="price">₹{{ $product_final_price }}</span></td>
                              </tr>
                              <tr class="discount-totals discount_section" style="{{$set_style_d}}">
                                <td>Discount</td>
                                <td class="text-right"><strong><span class="price p_discount_price">@if(!empty($set_discount_price))<?php echo '₹'.$set_discount_price ?>@endif</span></strong></td>
                              </tr>
                              <tr class="order-total">
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong><span class="price">₹{{ $total_c }}</span></strong> </td>
                              </tr>
                            </tbody>
                          </table>
                          <input type="hidden" id="cart_sub_total" value="{{$product_final_price}}">
                        </div>
                        <!-- order-table-wrapper -->
                      </div>
                    </div>
                  </div>
                 
                  <div class="col-lg-8 col-md-12 col-12">
                   
                    <!-- checkout-login -->
                    <div class="shipping-sections">
                     
						
						
						<div class="shipping-address shipping-section">
                        <h5 class="shipping-section-title">Shipping Addrress</h5>
                        <div class="shipping-address-items">
                        
							
							<?php $jsaddress = 0; ?>
							@if(count($addresses) > 0)
							@foreach($addresses as $address)
						  <div class="shipping-address-item selected-item">
                            <input type="radio" name="default-address" id="address-box" value="{{$address->id}}" class="float-right" @if($address->by_default === 1) checked @endif/>
                            <?php
                              if($address->by_default === 1){
                                $jsaddress = $address->id;
                              }
                            ?>
                            <h4 class="m-0 p-0 mb-2">@if($address->address_type === 1) Home @else Office @endif</h4>
                            <p>{{$address->name}} <span id="default">@if($address->by_default === 1) (default) @endif</span><br/>
                             {{$address->area}} {{$address->house}} {{$address->landmark}}
                             <?php
                                echo  \DB::table('countries')->where('id', $address->country_id)->first()->name;
                             //   echo '&nbsp;';
                            //    echo  \DB::table('states')->where('id', $address->state_id)->first()->name;
                             ?>
                             {{$address->city}} - {{$address->pincode}} <br>Mobile - {{$address->mobile}}</p>

                           <!-- <button type="button" class="btn btn-mod" id="modify-address" data-id="{{$address->id}}">Modify</button> -->
                       
                    </div>
                    @endforeach
                    @endif
							
				<div class="new-address-popup">
                          <button type="button" class="btn btn-primary action-show-popup" data-toggle="modal"
                            data-target="#newaddress">
                            <span>New Address</span>
                          </button>
					
					
                          <div class="modal fade checkout-newaddress-modal" id="newaddress" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h3 class="modal-title"> Shipping Address</h3>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="POST" action="{{url('save-shipping-address')}}">
									                  @csrf
                                    <div class="shipping-fields-wrapper row">
                                      <div class="form-group col-sm-6 col-12" id="shipping_first_name_field">
                                        <label for="shipping_first_name" class="">First name <abbr class="required"
                                            title="required">*</abbr></label>
										  
                                        <input type="text" class="input-text " name="shipping_first_name"
                                          id="add-fname" placeholder="" value="" required>
										   <p class="text-danger" id="add-firstname-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_last_name_field">
                                        <label for="shipping_last_name" class="">Last name <abbr class="required"
                                            title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="shipping_last_name"
                                          id="add-lname" placeholder="" value="" required>
										   <p class="text-danger" id="add-lastname-error"></p>
                                      </div>
                                     
                                      <div class="form-group col-sm-6 col-12" id="shipping_company_field">
                                        <label for="shipping_company" class="">Address  Type</label>
                                       
                                          <select name="shipping_add_type" id="add-country" class="country_select" required>
                                          <option value="">Select a address type</option>
                                         
											<option value="1">Home</option>
											<option value="2">Office</option>
										 
                                        </select>
										  
                                      </div>
                                     
                                      <div class="form-group col-sm-6 col-12" id="shipping_company_field">
                                        <label for="shipping_company" class="">Company name</label>
                                        <input type="text" class="input-text " name="shipping_company"
                                          id="add-company" placeholder="" value="">
										   <p class="text-danger" id="add-company-error"></p>
										  
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_country_field">
                                        <label for="shipping_country" class="">Country / Region <abbr class="required"
                                            title="required">*</abbr></label>
                                        <select name="shipping_country" id="add-country" class="country_select" required>
                                          <option value="">Select a country / region…</option>
                                          @foreach ($countries as $country)
											<option value="{{$country->id}}">{{$country->name}}</option>
										  @endforeach
                                        </select>
										   <p class="text-danger" id="add-country-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_address_1_field">
                                        <label for="shipping_address_1" class="">Street address <abbr class="required"
                                            title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="shipping_address_1"
                                          id="add-street" placeholder="House number and street name" value="" required>
										   <p class="text-danger" id="add-street-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_address_2_field">
                                        <label for="shipping_address_2">Apartment, suite, unit, etc. <abbr class="required"
                                            title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="shipping_address_2"
                                          id="add-appartment" placeholder="Apartment, suite, unit, etc. (optional)"
                                          value="" required>
										   <p class="text-danger" id="add-appartment-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_city_field">
                                        <label for="shipping_city" class="">Town / City <abbr class="required"
                                            title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="shipping_city" id="add-city"
                                          placeholder="" value="" required>
										   <p class="text-danger" id="add-city-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_state_field">
                                        <label for="shipping_state" class="">State <abbr class="required"
                                            title="required">*</abbr></label>
                                        <select name="shipping_state" id="add-state" class="state_select" required>
                                          <option value="">Select an option…</option>
                                          <option value="AL">Rajasthan</option>
                                        </select>
										  <p class="text-danger" id="add-state-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_postcode_field">
                                        <label for="shipping_postcode" class="">ZIP <abbr class="required"
                                            title="required">*</abbr></label>
                                        <input type="text" class="input-text " name="shipping_postcode"
                                          id="add-pincode" placeholder="" value="" required>
										  <p class="text-danger" id="add-pincode-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_phone_field">
                                        <label for="shipping_phone" class="">Phone <abbr class="required"
                                            title="required">*</abbr></label>
                                        <input type="tel" class="input-text " name="shipping_phone" id="add-phone"
                                          placeholder="" value="" required>
										  <p class="text-danger" id="add-phone-error"></p>
                                      </div>
                                      <div class="form-group col-sm-6 col-12" id="shipping_email_field">
                                        <label for="shipping_email" class="">Email address <abbr class="required"
                                            title="required">*</abbr></label>
                                        <input type="email" class="input-text " name="shipping_email"
                                          id="add-email" placeholder="" value="" required>
										  <p class="text-danger" id="add-email-error"></p>
                                      </div>
                                      <div class="form-group text-right col-sm-12 col-12">
                                        <button type="submit"   id="save-address" class="btn btn-primary">Submit</button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>				
						  <!-- <div class="shipping-address-item not-selected-item">
                            <p>John Smith <span class="ml-3">+91-7737384209</span></p>
                            <p>06, Shakti Vihar Kalyanpura Sanganer, Jaipur – Rajasthan, India - <span>302029</span></p>
                            <button type="button" class="btn btn-primary action-select-shipping-item"
                              data-bind="click: selectAddress">
                              <span data-bind="i18n: 'Ship Here'">Ship Here</span>
                            </button>
                          </div> -->
                        </div>
                        
                      <!-- Shipping Address -->

                      <div class="checkout-orders-summery shipping-section">
                        <h5 class="shipping-section-title">Your order</h5>
                        <div class="checkout-order-summery">
                          
						<?php $product_final_price=0; 
						    
						    ?>
							@foreach($carts_data as $product_data)
					
							<?php 	$product_price = $product_data->product_quantity * $product_data->product_price;		
									$product_final_price = $product_final_price + $product_price;
					
									$products_data = DB::table('products')->where('id',$product_data->product_id)->get(); 
							
							
							?>
							
							<div class="checkout-cart-item">
                            <div class="checkout-cart-wrap">
                              <div class="checkout-cart-image">
                                <a href="product-detail.html"><img src="{{ asset('/file/'.$product_data->product_image)  }}"></a>
                              </div>
                              <div class="checkout-cart-desc">
                                <p class="checkout-cart-title">{{ $product_data->product_name }}</p>
                                <p class="checkout-cart-meta"><span>Product Code : {{ $products_data[0]->sku_code }}</span></p>
                                <p class="checkout-cart-quantity">{{ $product_data->product_quantity }} × <span class="mini-cart-price"><span
                                      class="price">₹{{ $product_data->product_price }}</span></span></p>
                              </div>
                            </div>
                          </div>
							
							@endforeach
							
				          </div>
                        </div>                        
                      </div>
                      <!-- shipping-order-summery -->

                      <!-- <div class="checkout-gift-wrapper shipping-section">
                        <h5 class="shipping-section-title">Gift Wrap</h5>
                        <div class="gift-wrapper" id="giftwrapper">
                          <div class="row">
                            <div class="form-group col-12">
                              <label>Select Gift Option</label>
                              <div class="form-group-radio">
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="gift50" name="gift" class="custom-control-input">
                                  <label class="custom-control-label" for="gift50">Rs. 50</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="gift30" name="gift" class="custom-control-input">
                                  <label class="custom-control-label" for="gift30">Rs. 30</label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group col-sm-6 col-12">
                              <label>To</label>
                              <input type="text" class="form-control" id="gift_to" name="gift_to"
                                placeholder="Enter Recepients Name" required="">
                            </div>
                            <div class="form-group col-sm-6 col-12">
                              <label for="input1">Form</label>
                              <input type="text" class="form-control" id="gift_from" placeholder="Enter Sender's Name"
                                name="gift_from" required="">
                            </div>
                            <div class="form-group col-sm-12 col-12">
                              <label for="input1">Message</label>
                              <textarea class="form-control" placeholder="Add your message"
                                name="gift_message"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="SUBMIT">
                          </div>
                        </div>
                      </div> -->
                      <!-- checkout-gift-wrapper -->

                      <div id="payment" class="checkout-payment shipping-section">
                        <h5 class="shipping-section-title">Payment Details</h5>
                        <div class="payemt-option">
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="payment-wallet" name="payment-input" class="custom-control-input"
                              value="wallet" checked>
                            <label class="custom-control-label" for="payment-wallet">Wallet</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="payment-razorpay" name="payment-input" class="custom-control-input"
                              value="razorpay">
                            <label class="custom-control-label" for="payment-razorpay">Razorpay</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="payment-cod" name="payment-input" class="custom-control-input"
                              value="cod">
                            <label class="custom-control-label" for="payment-cod">COD</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="payment-paypal" name="payment-input" class="custom-control-input"
                              value="paypal">
                            <label class="custom-control-label" for="payment-paypal">PayPal</label>
                          </div>
                        </div>
                        <div class="payment-methods-option">
                          <div id="payment-wallet" class="payment-method wallet">
                            <div class="payment-box">
                              <h4 class="payment-box-title">Pay with your wallet</h4>
                              
								
								@if(\Auth::check())
                                  <?php $wallet = \App\Models\Wallet::where('user_id', \Auth::user()->id)->first(); ?>
                                  <h1>Rs {{\Auth::check() ? $wallet->amount : 0}}</h1>
                                  <button type="submit" class="button" onclick="return confirm('Are you sure you would like to Continue?');" style="margin-top : 50px;border-radius : 20px;padding: 10px 30px;" id="wallet-btn" data-amount="{{\Auth::check() ? $wallet->amount : 0}}">Processed Payment</button>
                                  <h3 class="wallet-alert text-primary font-weight-bold">
                                  </h3>
                                @else
                                  <h1>Balance 0.00</h1>
                                @endif
								
								
                              
                            </div>
                          </div>
                          <div id="payment-razorpay" class="payment-method razorpay" style="display: none;">
                            <div class="payment-box">
                              <h4 class="payment-box-title"> Pay with Razorpay</h4>
                              <p>Pay with Razorpay.</p>
                              <button type="submit" class="button" name="checkout_place_order" id="place_order"
                                value="Place order" data-value="Place order">Place order</button>
                            </div>
                          </div>
                          <div id="payment-cod" class="payment-method cod" style="display: none;">
                            <div class="payment-box">
                              <h4 class="payment-box-title">Cash on delivery</h4>
                              <p>Pay with cash upon delivery.</p>
                              <button type="submit" class="button" name="checkout_place_order" id="place_order"
                                value="Place order" data-value="Place order">Place order</button>
                            </div>
                          </div>
                          <div id="payment-paypal" class="payment-method paypal" style="display: none;">
                            <div class="payment-box">
                              <h4 class="payment-box-title">Pay with PayPal</h4>
                              <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                              </p>
                              <button type="submit" class="button" name="checkout_place_order" id="place_order"
                                value="Place order" data-value="Place order">Place order</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- checkout-payment -->
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

jQuery(document).ready(function ($) {						 
  $(document).on('click','#wallet-btn', function(e){
     e.preventDefault();
     wamount = $(this).attr('data-amount');
     usewallet = true;
     $(this).attr('disabled', true);
  });

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

});
</script>	

@endpush