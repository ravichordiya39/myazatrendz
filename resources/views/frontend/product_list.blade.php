@php

//echo "<pre>"; print_r($searchproducts); die;

@endphp

@if(count($searchproducts) > 0)
	@foreach($searchproducts as $product)

	      <div class="product-item animate__animated animate__fadeInUp">
	        <div class="product-wrap">
	            <div class="product-image">
                            <?php $l = 0; ?>

	                <a class="pro-img" href="{{route('product.detail',$product['slug'])}}">
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
	                    <a href="{{route('product.detail',$product['slug'])}}" class="quick-view" data-toggle="tooltip" data-placement="top" title="Quickview">
	                        <i class="fa fa-eye"></i>
	                    </a>
	                </div>
	            </div>
	            <div class="product-content">           
	                <h3 class="product-title">
	                    <a href="{{route('product.detail',$product['slug'])}}" >{{$product['name']}}</a>
	                </h3>           
	                <div class="product-price">
	                    <span class="new-price">₹{{$product['single_sales_price']}}</span>                
	                    <span class="old-price">₹{{$product['single_mrp_price']}}</span>                
	                </div> 
	                <div class="product-quantity">                                               
	                    <div class="quantity-group">
	                        <a href="javascript:void(0)" class="dec qty-btn"></a>
	                        <input type="text" id="quantity" class="input-text qty" name="quantity" value="1" maxlength="50">
	                        <a href="javascript:void(0)" class="inc qty-btn"></a>
	                    </div>
	                    <div class="product-bulk-cart">
	                        <input type="checkbox" name="product-select[]" data-froma="trim1_0" id="product_1" class="bulk-cart-select" value="">
	                        <label for="product_1" class="bulk-cart-label">Bulk Cart</label>
	                    </div>
	                </div>
	                <div class="product-extra">
	                    <p>Available Qty : {{$product['in_stock']}}</p>             
	                    <p>SKU : {{$product['sku']}}</p>                                                       
<!-- 	                    <p>1 Piece Of Necklace : 1 Pair Of Earring</p> -->
	                </div>   
	            </div>
	        </div>
	      </div>

	@endforeach
@else
<div class="col-sm-12">
<center><h3>No data found.</h3></center>
</div>	
@endif

<div class="col-sm-12">

        {!! $prods->render() !!}
</div>	
