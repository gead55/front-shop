                    @php                     
                        $images = json_decode($item->filename,true)
                    @endphp
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('constants.IMG_URL')}}{{$item->pathfile}}{{$images[0]}}" alt="" />
                                    <h2>${{$item->price}}</h2>
                                    <p>{{$item->product_name}}</p>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>${{$item->price}}</h2>
                                        <!-- <p>${{$item->product_name}}</p> -->
                                        <form method="POST" action="{{url('cart')}}">
                                            <input type="hidden" name="product_id" value="{{$item->id}}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-fefault add-to-cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                Add to cart
                                            </button>
                                        </form>
                                        <a href='{{url("products/details/$item->id")}}' class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>