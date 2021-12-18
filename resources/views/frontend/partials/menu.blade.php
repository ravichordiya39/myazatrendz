  @foreach(App\Models\Category::getAllCategory() as $value)                    
                    @if(count(App\Models\Category::getsubCategory($value->id)) == 0)
                    <li>
                    <a href="{{url('')}}/{{$value->slug}}">{{$value->name}}</a>
                    </li>
                    @else
                    <li class="has-children">
                    <a href="{{url('')}}/{{$value->slug}}">{{$value->name}}</a>
                      <div class="mega-menu">
                        <div class="mega-menu-area">                         
                            <div class="mega-menu-items">                              
                              <div class="mega-submenu">
							  @foreach(App\Models\Category::getsubCategory($value->id) as $key=> $subCat)
                                    <div class="mega-submenu-column">
                                      <h4 class="mega-menu-title"><a href="{{url('')}}/{{$value->slug}}/{{$subCat->slug}}">{{$subCat->name}}</a></h4>
                                      <ul class="mega-submenu-item">
									  	@foreach($subCat->subcat as $subsCat)
                                        <li><a href="{{url('')}}/{{$value->slug}}/{{$subCat->slug}}/{{$subsCat->slug}}">{{$subsCat->name}}</a></li>
                                        @endforeach
                                      </ul>
                                    </div>
								@endforeach                  
                                    
                                  </div>
                              <div class="mega-submenu-img">
							  	<img src="{{asset('file')}}/{{$value->image}}" alt="">
                              </div>      
                            </div>                           
                        </div>
                      </div>
                    </li>
                    @endif

    @endforeach                  
