@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')

        <section class="site-content">
            <div class="page-banner-section">
                
            </div>
            <div class="content-wrapper">
                <div class="container-custom">
                    <div class="page-header text-center">
                        <h1 class="page-title">My WishList</h1>
                    </div>
                  <div class="product-cat-page">
                    <div class="content-box">
                      <div class="row flex-row-reverse">
                          <div class="content-area col"> 
                              <div class="products  with-bg-white columns-4 product_list_page">
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
                                                        <div class="product-action product-wishlist-a">
                                                            <a class="wishlist" href="{{url('remove-from-wishlist')}}/{{$product['id']}}" data-toggle="tooltip" data-placement="top" title="Remove From Wishlist">
                                                                <i class="fa fa-heart"></i>
                                                            </a>
                                                            <a href="{{url('single-add-to-cart')}}/{{$product['id']}}" class="add-to-cart ajax-spin-cart" data-toggle="tooltip" data-placement="top" title="Add to cart" >                  
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
                                                        <div class="product-extra">
                                                            <p>Available Qty : {{$product['in_stock']}}</p>             
                                                            <p>SKU : {{$product['sku']}}</p>
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
                              </div>
                          </div>
                      </div>
                    </div>  
                  </div>
                </div>
            </div>
        </section>

@endsection

@push('scripts')

@endpush
