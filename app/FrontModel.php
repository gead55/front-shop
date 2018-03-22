<?php

namespace App;

use App\Product;

class FrontModel extends BaseModel
{
    // public function __construct() {

    // }

    public function getFeature()
    {
	    $product = new Product();

	    $data = $product->all();

	    return $data;
    }
}
