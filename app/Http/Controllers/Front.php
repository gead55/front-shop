<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
Use App\User;
Use App\FrontModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Cart;

class Front extends Controller {

    var $brands;
    var $categories;
    var $products;
    var $title;
    var $description;
    var $data;

    public function __construct() {
        $this->brands = Brand::all(array('name'));
        $this->categories = Category::all(array('id','name'));
        $this->products = Product::all(array('id', 'product_code', 'price'));
    }

    public function index() {
        $this->data['title'] = 'Welcome';
        $this->data['description'] = '';
        $this->data['page'] = 'home';
        $this->data['brands'] = $this->brands;
        $this->data['categories'] = $this->categories;
        $this->data['products'] = $this->products;
        
        $features = new FrontModel();
        $category_tabs = new FrontModel();

        $this->data['features'] = $features->getFeature();
        $this->data['category_tabs'] = $category_tabs->getcategoryTabs();

        return view('home', $this->data);
    }

    public function products() {
        return view('products', array('title' => 'Products Listing', 'description' => '', 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_details($id) {
        $product = Product::find($id);
        return view('product_details', array('product' => $product, 'title' => $product->product_code, 'description' => '', 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_categories($name) {
        return view('products', array('title' => 'Welcome', 'description' => '', 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function product_brands($name, $category = null) {
        return view('products', array('title' => 'Welcome', 'description' => '', 'page' => 'products', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog() {
        return view('blog', array('title' => 'Welcome', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function blog_post($id) {
        return view('blog_post', array('title' => 'Welcome', 'description' => '', 'page' => 'blog', 'brands' => $this->brands, 'categories' => $this->categories, 'products' => $this->products));
    }

    public function contact_us() {
        return view('contact_us', array('title' => 'Welcome', 'description' => '', 'page' => 'contact_us'));
    }

    public function register() {
        if (Request::isMethod('post')) {
            User::create(['name' => Request::get('name'), 'email' => Request::get('email'), 'password' => bcrypt(Request::get('password')),]);
        }

        return Redirect::away('login');
    }

    public function authenticate() {
        if (Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')])) {
            return redirect()->intended('checkout');
        } else {
            return view('login', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
        }
    }

    public function login() {
        return view('login', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }

    public function logout() {
        Auth::logout();

        return Redirect::away('login');
    }

    public function cart() {
        //update/ add new item to cart
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $product = Product::find($product_id);
            Cart::add(array('id' => $product_id, 'name' => $product->product_code, 'qty' => 1, 'price' => $product->price));
        }
        
        $id = Request::get('product_id');
        $item = Cart::search(function ($cart, $key) use($id) {
            return $cart->id == $id;
         })->first();

        //increment the quantity
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            // $rowId = Cart::search(array('id' => Request::get('product_id')));
            // $item = Cart::get($rowId[0]);

            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            // $rowId = Cart::search(array('id' => Request::get('product_id')));
            // $item = Cart::get($rowId[0]);

            Cart::update($item->rowId, $item->qty - 1);
        }


        $cart = Cart::content();

        return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }

    public function clear_cart() {
        Cart::destroy();
        return Redirect::away('cart');
    }

    public function checkout() {
        return view('checkout', array('title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }

    public function search($query) {
        return view('products', array('title' => 'Welcome', 'description' => '', 'page' => 'products'));
    }

}
