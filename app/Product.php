<?php

namespace App;

class Product extends BaseModel {
    protected $primaryKey = 'id';
    protected $table = 'products';
    protected $fillable = array('product_code', 'product_name', 'description','price','category_id','brand_id','created_at_ip', 'updated_at_ip');

    /**
     * Get the brand that the product belongs to.
     */
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}