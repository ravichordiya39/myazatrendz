@extends('frontend.layouts.app')

@push('styles')
@endpush

@section('content')
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
        <!--ko if: $parents[1].isCategoryLandingPage -->
          <div class="panel-body category">
            <!-- ko foreach: refinements.display -->
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
            <!-- /ko -->
          </div>
        <!-- /ko -->
        <!-- ko ifnot: $parents[1].isCategoryLandingPage--><!-- /ko -->
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

            <!-- <div id="searchResults" class="search-results-block"></div> -->
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
      <div class="product_list_page">
      </div>
</div>

</div>
</div>
</div>
<div class="clear height60"></div>
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
    var sortby = 'no';
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
            console.log($(this).attr('data-id'));
            var id = $(this).attr('data-id');
            sizes.push(id);
          }
        });
        getData(1);
     });


     $(document).on('change',"#attribute", function(){
       $('[id="attribute"]').each(function(){
         console.log('Run');
          if($(this).is(':checked')){
            console.log($(this).attr('data-id'));
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            attributes.push({attr_id : name, value_id : id});
          }
        });

        console.log(attributes);
        getData(1);
     });
     function getData(page) {
         var new_url = "{{url('search')}}"+'?q=' + "{{$query}}" +'&page=' + page + `&sordby=${sortby}${colors}`;
         new_url = "{{url('search')}}";
         console.log({q : "{{$query}}", page : page, sortby : sortby, colors : colors, sizes : sizes, attributes : attributes});
         $.ajax({
             url : new_url,
             type : 'get',
             datatype : 'html',
             data : {q : "{{$query}}", page : page, sortby : sortby, colors : colors, sizes : sizes, attributes : attributes}
         }).done(function(data){
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
     $('.product-display-mode #grid').toggleClass('active');
     $('.product-display-mode #grid_large').toggleClass('active');
   });
   $('.product-display-mode #grid_large').click(function(){
     $('.products-list').addClass('columns-4');
     $('.products-list').removeClass('columns-3');
     $('.product-display-mode #grid').toggleClass('active');
     $('.product-display-mode #grid_large').toggleClass('active');
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
