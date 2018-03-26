@extends('layouts.layout')

@section('content')       
<section id="advertisement">
    <div class="container">
        <img src="{{asset('images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('shared.sidebar')
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">{{$description}} Items</h2>
                    @foreach($product_pages as $item)
                        @include('include.items')
                    @endforeach
                    <div class="text-center">{!! $product_pages->render() !!}</div>
            </div>
                <!-- product_pages -->
            </div>
        </div>
    </div>
</section>
@endsection