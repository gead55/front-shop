@extends('layouts.layout')

@section('content')       

@include('include.slider')
<?php
    $img_url = Config('constants.IMG_URL')
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('shared.sidebar')
                </div>
            </div>

            <div class="col-sm-9 padding-right">

                @include('include.feature')
                @include('include.category')
                @include('include.recommend')

            </div>
        </div>
    </div>
</section>
@endsection