
                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            
                            @foreach($recommends as $key => $item)
                                @php                     
                                    $images = json_decode($item->filename,true)
                                @endphp
                            @if($key%3 == 0)
                            <div class="item @if($key == 0) active @endif">
                            @endif
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="{{$img_url}}{{$item->pathfile}}{{$images[0]}}" alt="" />
                                                <h2>{{$item->price}}</h2>
                                                <p>{{$item->product_name}}</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @if($key%3 == 2)
                            </div>
                            @endif
                            @endforeach
                            @if($key%3 != 2)
                            </div> <!-- end for item not full 3 -->
                            @endif

                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>			
                    </div>
                </div><!--/recommended_items-->
