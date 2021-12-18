@extends('frontend.layouts.app')

@push('styles')

@endpush

@section('content')
<style>
    .filter-dropdown-menu.dropdown-menu.show{
        transform: translate3d(0px, 38px, 0px) !important;
    }
</style>
        <section class="site-content">
            <div class="page-banner-section">
                <div class="page-banner page-banner-bg">
                    <div class="container-custom">
                        <div class="page-banner-wrap">
                            <div role="navigation" aria-label="Breadcrumbs" class="breadcrumbs">
                                <ul class="breadcrumb-items">
                                    <li class="breadcrumb-item trail-begin"><a href="{{url('/')}}" rel="home"><span itemprop="name">Home</span></a></li>
                                    <li class="breadcrumb-item trail-end"><span itemprop="name">Product List</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page-banner-section -->
            <div class="content-wrapper">
                <div class="container-custom">
                    <div class="page-header text-center">
                        <h1 class="page-title">{{$primary}} {{$mycat}}</h1>
                    </div>
                  <!--  <div class="product-banner-image">-->
                  <!--    <img src="images/banner-cat.jpg" alt="">-->
                  <!--</div>-->
                  <div class="product-cat-page">
                    <div class="content-box">
                      <div class="product-sortby-filter">
                        <div class="filters">
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Category</button>
                                <div class="filter-dropdown-menu dropdown-menu">
                                    <ul class="layer-filter category-filter">
<!--
                                        <li>
                                            <input name="cat" id="cat_ring" value="s" type="checkbox">
                                            <label for="cat_ring"> Anarkali Kurti (4) </label>
                                        </li>
-->
							            @foreach($categories as $category)
							                <li>
							                <label for="cat_ring"><a style="color: inherit;" href="{{url('')}}/{{$category->slug}}"> {{$category->name}} (
							                        <?php
							                          $catcount = \App\Models\Product::where('category_id', $category->id)->where('status',1)->get();
							                          if($catcount){
							                              echo $catcount->count();
							                          }
							                          else{
							                              echo 0;
							                          }
							                        ?>
							                            ) </a></label>
											</li>
							            @endforeach
 
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Size</button>
                                <div class="filter-dropdown-menu dropdown-menu">
                                    <ul class="layer-filter size-filter">
                                        @foreach($sizes as $size)
                                            <li><input name="cat" id="filter_size" value="{{$size->id}}" type="checkbox">
                                                <label for="filter_size"> {{$size->name}} <span>(
                                                    <?php
                                                        echo DB::table('product_variations')->where('size_id', $size->id)->whereIn('product_id', $products)->get()->count();
                                                        ?>)
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                        <!-- <li class="active">
                                            <input class="color-option" name="color" value="" style="background: #000000;" type="button">
                                            <label for=""> Black (8) </label>
                                        </li>
                                        <li>
                                            <input class="color-option" name="color" value="" style="background: #ff0000;" type="button">
                                            <label for=""> Red (16) </label>
                                        </li>
                                        <li>
                                            <input class="color-option" name="color" value="" style="background: #5d9cec;" type="button">
                                            <label for=""> Blue (16) </label>
                                        </li>
                                        <li>
                                            <input class="color-option" name="color" value="" style="background: #f1c40f;" type="button">
                                            <label for=""> Yellow (16) </label>
                                        </li>
                                        <li>
                                            <input class="color-option" name="color" value="" style="background: #964b00;" type="button">
                                            <label for=""> Brown (16) </label>
                                        </li>
                                        <li>
                                            <input class="color-option" name="color" value="" style="background: #c19a6b;" type="button">
                                            <label for=""> Camel (16) </label>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Fabric</button>
                                <div class="filter-dropdown-menu dropdown-menu">
                                    <ul class="layer-filter color-filter">
                                        @foreach($attribute_fabrics as $attribute)
                                            <li>
                                                <input id="fabric_filter" class="type-option" name="type" value="{{$attribute->id}}" type="checkbox">
                                                <label for=""> {{$attribute->value}} <span>(
                                                    <?php
                                                        echo DB::table('product_attributes')->where('attribute_value_id', $attribute->id)->whereIn('product_id', $products)->get()->count();
                                                        ?>)
                                                    </span>
                                                </label>
                                            </li>
                                        @endforeach
                                        <!-- <li class="active">
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> Cotton Slub</label>
                                        </li>
                                        <li>
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> Linen</label>
                                        </li>
                                        <li>
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> Rayon</label>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Price</button>
                                <div class="filter-dropdown-menu dropdown-menu">
                                    <ul class="layer-filter color-filter">
                                        <!-- <li class="active">
                                            <input class="type-option" name="type" value="" type="checkbox">
                                            <label for=""> All</label>
                                        </li> -->
                                        <li>
                                            <input id="price_filter" class="type-option" name="type" value="1-500" type="checkbox">
                                            <label for=""> 1-500</label>
                                        </li>
                                        <li>
                                            <input id="price_filter" class="type-option" name="type" value="500-1000" type="checkbox">
                                            <label for=""> 500-1000</label>
                                        </li>
                                        <li>
                                            <input id="price_filter" class="type-option" name="type" value="1001-2000" type="checkbox">
                                            <label for=""> 1001-2000</label>
                                        </li>
                                        <li>
                                            <input id="price_filter" class="type-option" name="type" value="2000-999999999" type="checkbox">
                                            <label for=""> Above 2000</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-toggle">
                                <div class="showall-filter">
                                    <button class="filter-open"><i class="fas fa-sliders-h"></i> More Filter </button>
                                    <button class="filter-hide d-none"><i class="fas fa-sliders-h"></i> Hide Filter </button>
                                </div>
                            </div>
                        </div>
                    
                        <div class="sortby">
                            <p class="product-count"><span class="product_counts">0</span> Items</p>
                            <div class="filter-dropdown dropdown">
                                <button class="filter-dropdown-title" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort
                                    By</button>
<!--
              <div class="sortby">
                        <select class="sortby-dropdown form-control"  id="sortby-drop">
                            <option value="no">Select..</option>
                            <option value="plth">Price low to high</option>
                            <option value="phtl">Price high to low</option>
                            <option value="popular" selected="true">Popularity</option>
                            <option value="discount">Discount</option>
                            <option value="relevance">Relevance</option>
                        </select>
-->

                                <div class="filter-dropdown-menu dropdown-menu">
                                    <ul class="layer-filter sort-filter">
                                        <li>
                                            <input name="orderby" id="sortby-drop" value="popular" type="radio">
                                            <label for="popularity"> Popularity </label>
                                        </li>
                                        <li>
                                            <input name="orderby" id="sortby-drop" value="relevance" type="radio">
                                            <label for="date"> Latest </label>
                                        </li>
                                        <li>
                                            <input name="orderby" id="sortby-drop" value="plth" type="radio">
                                            <label for="price"> Price: low to high </label>
                                        </li>
                                        <li>
                                            <input name="orderby" id="sortby-drop" value="phtl" type="radio">
                                            <label for="price-desc"> Price: high to low </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>                           
                            <div class="product-display-mode">
                                <span id="grid_large" class="active"><a href="javascript:void(0);" title="4 Column"><i
                                            class="fas fa-th"></i></a></span>
                                <span id="grid"><a href="javascript:void(0);" title="3 Column"><i class="fas fa-th-large"></i></a></span>
                            </div>
                        </div>
                      </div>
                      <!-- product-sortby-filter -->
                      <div class="row flex-row-reverse">
                          <div class="content-area col"> 
                              <div class="products  with-bg-white columns-4 product_list_page">

                              </div>  
 
                          </div>
                          <!--content-area-->
                          <div class="filter-sidebar product-sidebar-area">                          
                                <h3 class="filter-sidebar-heading">
                                    Filter By
                                    <span class="filter-sidebar-close"><i class="fas fa-times"></i></span>
                                </h3>

                                @if($attributes->count() > 0)
                                @foreach($attributes as $attr)

                                <div class="product-widget-color product-widget">
                                    <h4 class="product-widget-title">{{$attr->name}} </h4>
                                    <ul class="product-widget-filter color-filter">
    									@if($attr->attribute_values)
        									@foreach($attr->attribute_values as $value)
        									<li>
        										<input type="checkbox" class="filter" id="attribute" data-name="{{$attr->id}}" data-id="{{$value->id}}">
        										<label for=""> {{$value->value}} <span>(
                                                        <?php
                                                            echo DB::table('product_attributes')->where('attribute_value_id', $value->id)->whereIn('product_id', $products)->get()->count();
                                                            ?>)
                                                        </span>
                                                </label>
        									</li> 
        									@endforeach
    									@endif
                                    </ul>
                                </div>

                              @endforeach
                              @endif   

                                <div class="product-widget-color product-widget">
                                    <h4 class="product-widget-title">Color </h4>
                                    <ul class="product-widget-filter color-filter">
                                        
                                        @if($colors->count() > 0)
                                        @foreach($colors as $color)
                                            <li>
                                                <input type="checkbox" class="filter" id="color-{{$color->id}}" data-name="{{$color->name}}" data-id="{{$color->id}}">
                                                <label for="color-{{$color->id}}" style="cursor:pointer">{{$color->name}} <span>(
                                                        <?php
                                                            echo DB::table('product_variations')->where('color_id', $color->id)->whereIn('product_id', $products)->groupby('product_id')->get()->count();
                                                            ?>)
                                                        </span>
                                                </label>
                                            </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>

                                <div class="product-widget-color product-widget">
                                    <h4 class="product-widget-title">Size </h4>
                                    <ul class="product-widget-filter color-filter">
                                        
                                        @if($sizes->count() > 0)
                                            @foreach($sizes as $size)
                                                        <li><input type="checkbox" class="filter" id="size-{{$size->id}}" data-name="{{$size->name}}" data-id="{{$size->id}}"><label for="size-{{$size->id}}" style="cursor:pointer">{{$size->name}} <span>(
                                                        <?php
                                                            echo DB::table('product_variations')->where('size_id', $size->id)->whereIn('product_id', $products)->get()->count();
                                                            ?>)
                                                        </span></label></li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>

                          </div>
                          <!--sidebar-section-->
                      </div>
                      <!--row-->
                    </div>  
                  </div>
                </div>
                <!--content-wrapper -->
            </div>
            <!--container-->
        </section>

<!--
<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li><a href="category.html">Shop</a></li>
        <li class="active">{{$primary}} {{$mycat}}</li>
    </ol>

  <div class="row">
    <aside class="col-md-3 fabdesgins-filter" id="column-left">


<button class=" btn-success2" id="filterby">REFINE BY <div class="plus-minus-toggle collapsed"></div> </button>


      <div class="">
              <div class="panel panel-default ">
        <div class="panel-heading">
          <h4><span class="" data-bind="attr: {id: 'CC-guidedNavigation-dimensionHeader-'+ $index()}, text: displayName" id="CC-guidedNavigation-dimensionHeader-0">Category</span></h4>
        </div>
        <div data-bind="attr: {id: 'CC-guidedNavigation-collapseList-'+ $index()}" class="" id="CC-guidedNavigation-collapseList-0">

          <div class="panel-body category">

            @foreach($categories as $category)
                <li>
                    <a href="https://vasvi.in/search?q=26">
                        <span class="label_txt">{{$category->name}}</span>
                        <span class="count_txt">(
                        <?php
                          $catcount = \App\Models\Product::where('category_id', $category->id)->get();
                          if($catcount){
                              echo $catcount->count();
                          }
                          else{
                              echo 0;
                          }
                        ?>
                            )</span>
                    </a>
                </li>
            @endforeach
           </div>
         </div>
    </div>
            </div>


    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Color</a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="lft-list-conent">
                        @if($colors->count() > 0)
                        @foreach($colors as $color)
                                    <li><input type="checkbox" class="filter" id="color-{{$color->id}}" data-name="{{$color->name}}" data-id="{{$color->id}}"><label for="color-{{$color->id}}" style="cursor:pointer">{{$color->name}} <span>(
                                        <?php
                                            echo DB::table('product_variations')->where('color_id', $color->id)->get()->count();
                                        ?>
                                        )</span></label></li>
                        @endforeach
                    @endif
                    </ul>
                </div>
            </div>
        </div>

<div class="panel-group" id="accordion">

  <div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Size</a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
            <ul class="lft-list-conent">


                @if($sizes->count() > 0)
                    @foreach($sizes as $size)
                                <li><input type="checkbox" class="filter" id="size-{{$size->id}}" data-name="{{$size->name}}" data-id="{{$size->id}}"><label for="size-{{$size->id}}" style="cursor:pointer">{{$size->name}} <span>(
                                <?php
                                    echo DB::table('product_variations')->where('size_id', $size->id)->get()->count();
                                    ?>)
                                </span></label></li>
                    @endforeach
                @endif

            </ul>

        </div>
    </div>
</div>

@if($attributes->count() > 0)
@foreach($attributes as $attr)
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$attr->id}}">{{$attr->name}}</a>
      </h4>
    </div>
    <div id="collapse_{{$attr->id}}" class="panel-collapse collapse">
      <div class="panel-body">
        <ul class="lft-list-conent">
            @if($attr->attribute_values)
                  @foreach($attr->attribute_values as $value)
                               <><input type="checkbox" class="filter" id="attribute" data-name="{{$attr->id}}" data-id="{{$value->id}}"><a href="#">{{$value->value}}</a></li>
                  @endforeach
             @endif
          {{-- <li><input type="checkbox" class="filter" data-name="attributes" id="attribute111" data-id="111"> <a href="#">Cotton</a></li> --}}
        </ul>
       </div>
    </div>
  </div>
  @endforeach
  @endif

   <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine">Price</a>
            </h4>
          </div>
          <div id="collapseNine" class="panel-collapse collapse">
            <div class="panel-body">
               <ul class="lft-list-conent">
                <li><input type="checkbox"> <a href="#"> Below  <i class="fa fa-inr" aria-hidden="true"></i> 700 (360)</a></li>
                <li><input type="checkbox"> <a href="#"> <i class="fa fa-inr" aria-hidden="true"></i>700 - 1,000 (215)</a></li>
                <li><input type="checkbox"> <a href="#">Morpankh</a></li>
                <li><input type="checkbox"> <a href="#">Srishti</a></li>

              </ul>

                 <div class="price-range-block">

            <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

            <div class="price_input">
            <input type="text" min="0" max="9900" oninput="validity.valid||(value='0');" id="min_price" class="form-control">
            to
            <input type="text" min="0" max="10000" oninput="validity.valid||(value='1000');" id="max_price" class="form-control">
            <button class="btn pinkBtn btn-price">GO</button>
            </div>

            </div>

             </div>
          </div>
      </div>


</div>


    </aside>
    <div class="col-md-9 category-rgt-panel">
       <div class="filter-section category">
        <div class="row">
           <div class="col-md-6">
               <h2 class="category_title">{{$primary}} {{$mycat}} <span class="product_counts">(438 results)</span></h2>
           </div>

          <div class="col-md-6 text-right">
              <div class="sortby">
                        <select class="sortby-dropdown form-control"  id="sortby-drop">
                            <option value="no">Select..</option>
                            <option value="plth">Price low to high</option>
                            <option value="phtl">Price high to low</option>
                            <option value="popular" selected="true">Popularity</option>
                            <option value="discount">Discount</option>
                            <option value="relevance">Relevance</option>
                        </select>
                          <div class="product-display-mode">
                              <span id="grid_large" class="active"><a href="javascript:void(0);" title="4 Column"><i class="fa fa-th-large"></i></a></span>
                              <span id="grid"><a href="javascript:void(0);" title="3 Column"><i class="fa fa-th"></i></a></span>
                          </div>
                      </div>


          </div>

        </div>
      </div>
      <div class="clear"></div>

</div>

</div>
</div>
</div>
<div class="clear height60"></div>
-->

@endsection

@push('scripts')
<script>
    $(function(){
        var product = [];
       $(document).on('click','.prod-info', function(e){
         e.preventDefault();
         var id = $(this).attr('id');
         var url = "{{url('product')}}" + `/${id}`;
         $.ajax({
             url : url,
             type : 'get',
             success : function(data){
                 $(document).find('#product-box-modal').html(data.html);
                 $('#quickviews').modal('show');
             },
             error : function(err){
                 alert('No response from server');
             }
             });
       });
    });

</script>
<script>
    var sortby = '';
    var categoryby = [];
    var priceby = [];
    var fabricby = [];
    var colors = [];
    var sizes = [];
    var attributes = [];
     $(window).on('hashchange',function(){
         if (window.location.hash) {
             var page = window.location.hash.replace('#', '');
             if (page == Number.NaN || page <= 0) {
                 return false;
             } else{
                 getData(page);
             }
         }
     });
     $(document).ready(function(){
         $(document).on('click','.pagination a',function(event){
             event.preventDefault();
             $(document).find('li').removeClass('active');
             $(this).parent('li').addClass('active');
             var url = $(this).attr('href');
             var page = $(this).attr('href').split('page=')[1];
             getData(page);
         });
     });

     $(document).on('change','#sortby-drop', function(){
        sortby = $(this).val();
        getData(1);
     });

     /* $(document).on('change','#cat_ring', function(){
        categoryby = [];
        $('[id="cat_ring"]').each(function(){
            if($(this).is(':checked')){
                var id = $(this).val();
                categoryby.push({value_id : id});
            }
        });

        console.log(categoryby);
        getData(1);
     }); */

     $(document).on('change',"#fabric_filter", function(){
        fabricby = [];
        $('[id="fabric_filter"]').each(function(){
            if($(this).is(':checked')){
                var id = $(this).val();
                fabricby.push({value_id : id});
            }
        });

        console.log(fabricby);
        getData(1);
     });

     $(document).on('change',"#price_filter", function(){
        priceby = [];
        $('[id="price_filter"]').each(function(){
            if($(this).is(':checked')){
                var id = $(this).val();
                priceby.push({value_id : id});
            }
        });

        console.log(priceby);
        getData(1);
     });

     $(document).on('change','#filter_size', function(){
       sizes = [];
        $('[id="filter_size"]').each(function(){
          if($(this).is(':checked')){
            var id = $(this).val();
            sizes.push(id);
          }
        });
        getData(1);
     });

     


     $(document).on('change','[id^="color-"]', function(){
       colors = [];
       $('[id^="color-"]').each(function(){
          if($(this).is(':checked')){
            console.log($(this).attr('data-id'));
            var id = $(this).attr('data-id');
            colors.push(id);
            // color_array += `&colors=${id}`;
          }
        });
        getData(1);
     });

     $(document).on('change','[id^="size-"]', function(){
       sizes = [];
       $('[id^="size-"]').each(function(){
          if($(this).is(':checked')){
            var id = $(this).attr('data-id');
            sizes.push(id);
          }
        });
        getData(1);
     });




     $(document).on('change',"#attribute", function(){
	     attributes = [];
       $('[id="attribute"]').each(function(){
         console.log('Run');
          if($(this).is(':checked')){
            console.log($(this).attr('data-id'));
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            attributes.push({attr_id : name, value_id : id});
          }else{
         //   attributes.pop({attr_id : name, value_id : id});	          
          }
        });

        console.log(attributes);
        getData(1);
     });
     function getData(page) {
         var new_url = "{{url('search')}}"+'?q=' + "{{$query}}" +'&page=' + page + `&sordby=${sortby}${colors}`;
         new_url = "{{url('search')}}";
         console.log({q : "{{$query}}", page : page, priceby : priceby, fabricby : fabricby, categoryby : categoryby, sortby : sortby, colors : colors, sizes : sizes, attributes : attributes});
         $.ajax({
             url : new_url,
             type : 'get',
             datatype : 'html',
             data : {q : "{{$query}}", page : page, priceby : priceby, fabricby : fabricby, categoryby : categoryby, sortby : sortby, colors : colors, sizes : sizes, attributes : attributes}
         }).done(function(data){
             // console.log(data.count);
             $(document).find('.count_txt').html(`(${data.count})`);
             $(document).find('.product_counts').html(`(${data.count})`);
             $('.product_list_page').empty().html(data.data);
             location.hash = page;
         }).fail(function(jqXHR,ajaxOptions,thrownError){
             alert('No response from server');
         });
     }

     getData(1);
</script>

<script>
    $(document).ready(function(){
      $("#filterby").click(function(){
        $(".panel-group").toggle(1000);
      });
    });
</script>

<script type="text/javascript">
     $('.product-display-mode #grid').click(function(){
     $('.products-list').addClass('columns-3');
     $('.products-list').removeClass('columns-4');
     $('.product-display-mode #grid').addClass('active');
     $('.product-display-mode #grid_large').removeClass('active');
   });
   $('.product-display-mode #grid_large').click(function(){
     $('.products-list').addClass('columns-4');
     $('.products-list').removeClass('columns-3');
     $('.product-display-mode #grid').removeClass('active');
     $('.product-display-mode #grid_large').addClass('active');
   });

  $(".circle-size").hide();
   $(".btn-close").click(function(){
   $(".circle-size").hide();
  });

  $(".btnbuynow").click(function(){
   $(".circle-size").show();
  });

   $(document).ready(function(){
       $('[data-toggle="tooltip"]').tooltip();
   });

//    $(function(){
//      $('#testDiv').slimScroll({
//          alwaysVisible: true,
//          railVisible: true
//      });
//      $('#testDiv2').slimScroll({
//          alwaysVisible: true,
//          railVisible: true
//      });
//    });

   $(document).ready(function(){
     $("#filterby").click(function(){
       $(".panel-group").toggle(1000);
     });
   });
</script>



@endpush
