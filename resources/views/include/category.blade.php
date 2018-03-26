
                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                        @foreach ($categories as $key => $category)
                            <li @if($key == 0) class="active" @endif><a href="#{{$category->id}}" data-toggle="tab">{{$category->name}}</a></li>
                            @php $iCate[$key] = $category->name; @endphp
                        @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                    @foreach ($category_tabs as $key => $ctabs)
                        <div class="tab-pane fade in" id="{{$ctabs['cate_id']}}" >
                        <?php var_dump($ctabs['obj_cate']); ?>
                        @if($ctabs['obj_cate'] == '')
                            <div> No Data!</div>
                        @else
                            @foreach ($ctabs['obj_cate'] as $key => $itabs)
                                @php                     
                                    $images = json_decode($itabs->filename,true)
                                @endphp
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{$img_url}}{{$itabs->pathfile}}{{$images[0]}}" alt="" />
                                            <h2>${{$itabs->price}}</h2>
                                            <p>{{$itabs->product_name}}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                        </div>
                    @endforeach
                    </div>
                </div><!--/category-tab-->
