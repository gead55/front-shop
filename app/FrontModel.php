<?php

namespace App;

use App\Product;
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

    public function getcategoryTabs(){

        $category = DB::table('categories')->select('id')->get();
        $all_tab = [];
            foreach ($category as $key => $value) {
                $all_tab[$key] = DB::table('products')
                         ->where('category_id', '=', $value->id)
                         ->limit(2)
                         ->get();
            }

        return $all_tab;
    }
}
