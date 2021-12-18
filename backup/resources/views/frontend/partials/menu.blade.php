<div class="menu-container">
    <div class="menu">
       <ul>
          <?php
             $categories= DB::table('categories')
            ->where(['status'=>1])
            ->where('deleted_at', NULL)
            ->get();

            $parents =  DB::table('categories')
            ->where(['status'=>1])
            ->where('deleted_at', NULL)
            ->where('parent_id', 0)
            ->pluck('id')->toArray();

          ?>
           <li><a class="menu1" href="#">All</a>
               <ul style="display:none;">
                   <div class="row">
                   <div class="col-md-8">
                           <?php $i =0 ; ?>
                           @foreach($categories as $subcategory)
                             @if($subcategory->parent_id !== 0 && in_array($subcategory->parent_id, $parents))
                             <?php $i++; ?>
                             <li class="menures">
                               <ul class="best">
                                   <a href="{{url('search?q=')}}{{$subcategory->id}}" style="cursor: pointer;"><div class="menu-inner-h">{{$subcategory->name}}</div></a>

                                   @foreach($categories as $childcategory)
                                     @if($childcategory->parent_id === $subcategory->id)
                                        <li><a href="{{url('search?q=')}}{{$childcategory->id}}">{{$childcategory->name}}</a></li>
                                     @endif
                                   @endforeach
                               </ul>
                           </li>
                             @endif
                           @endforeach
                   </div>
                   <div class="col-md-4">
                           <div class="menu_img">
                             <img src="{{asset('frontend/images/1d.jpg')}}" alt="">
                           </div>
                   </div>
                   </div>

               </ul>
           </li>
           @foreach($categories as $category)
            @if($category->parent_id === 0)
            <li><a class="menu1" href="{{url('search?q=')}}{{$category->id}}" style="cursor: pointer">{{$category->name}}</a>
                <ul style="display:none;">
                    <div class="row">
                    <div class="col-md-8">
                            <?php $i =0 ; ?>
                            @foreach($categories as $subcategory)
                              @if($subcategory->parent_id !== 0 && $subcategory->parent_id === $category->id)
                              <?php $i++; ?>
                              <li class="menures">
                                <ul class="best">
                                    <a href="{{url('search?q=')}}{{$subcategory->id}}" style="cursor: pointer;"><div class="menu-inner-h">{{$subcategory->name}}</div></a>

                                    @foreach($categories as $childcategory)
                                      @if($childcategory->parent_id === $subcategory->id)
                                       <li><a href="{{url('search?q=')}}{{$childcategory->id}}">{{$childcategory->name}}</a></li>
                                      @endif
                                    @endforeach
                                </ul>
                            </li>
                              @endif
                            @endforeach
                    </div>
                    <div class="col-md-4">
                            <div class="menu_img">

                              <img src="{{asset('file')}}/{{$category->image}}" alt="">
                            </div>
                    </div>
                    </div>

                </ul>
            </li>
            @endif
           @endforeach
       </ul>
    </div>
 </div>
