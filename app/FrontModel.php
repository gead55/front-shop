<?php

namespace App;

// use App\Product;
use DB;
class FrontModel extends BaseModel
{
    // public function __construct() {

    // }

    public function getFeature()
    {
	    // $product = new Product();
	    // $data = $product->all();
		$data = DB::table('products')
                // ->offset(10)
                ->limit(3)
                ->orderBy('id', 'desc')
                ->get();
	    return $data;
    }
}
