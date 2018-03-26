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

    public function getCategoryTabs(){

        $category = DB::table('categories')->select('id')->get();
        $all_tab = [];
            foreach ($category as $key => $value) {
                $all_tab[$key] = DB::table('products')
                         ->where('category_id', '=', $value->id)
                         ->limit(4)
                         ->get();
                $all_tab[$key] =array( 'cate_id' => $value->id , 'obj_cate' => $all_tab[$key] );
            }

        return $all_tab;
    }

    public function getRecommend()
    {
		$data = DB::table('products')
                // ->offset(10)
                ->limit(12)
                ->orderBy('created_at', 'desc')
                ->get();

	    return $data;
    }

    public function getProducts()
    {
        $data = DB::table('products')
                ->orderBy('created_at', 'desc')
                ->paginate();
        return $data;
    }

    public function getProductsById($id)
    {
        $data = DB::table('products')
                ->where('category_id','=', $id)
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        return $data;
    } 

    public function getBrands($id)
    {
        $data = DB::table('products')
                ->where('brand_id','=', $id)
                ->orderBy('created_at', 'desc')
                ->paginate(3);
        return $data;
    }   
}
