<?php

namespace App\Http\Controllers\Site;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\IProductRepository;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $productRepo;

    public function __construct(IProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    public function add_product($product_id)
    {
        $product = $this->productRepo->myFind($product_id);
        if ($product) {
            \Cart::add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price_after_discount,
                'quantity' => 1,
                'attributes' => array(
                    'featured_image' => $product->featured_image,

                )

            ));
            return redirect("/");
        } else {
            return redirect("/");
        }
    }

    public function add_to_cart()

    {

        $cartCollection = \Cart::getContent();
        $data['cartCollection'] = $cartCollection;
        $data["latest_products"] = $this->productRepo->GetLatestProductList();
        // return view('site.cart.shoppingcart', $data);
        return view('site.layouts.topmenu', $data);
    }

    public function cart()

    {

        $cartCollection = \Cart::getContent();
        $data['cartCollection'] = $cartCollection;
        $data["latest_products"] = $this->productRepo->GetLatestProductList();
        return view('site.cart.shoppingcart', $data);
    }



    public function cart_remove($product_id)
    {
        \Cart::remove($product_id);
        return redirect()->back();
    }
    public function cart_remove_one_product($product_id)
    {

        $product = \Cart::get($product_id);
        if ($product->quantity == 1) {
            \Cart::remove($product_id);
        } else {
            \Cart::update($product_id, array(
                'quantity' => -1,
            ));
        }
        return redirect()->back();
    }

    public function cart_add_one_product($product_id)
    {
        $product = \Cart::get($product_id);
        // return $product->quantity;
        // $product = $this->productRepo->myFind($product_id);
        \Cart::update($product_id, array(
            'quantity' => 1,
        ));

        //$a= $product->price * $product->quantity;
        return redirect()->back();
    }
    public function checkout()
    {

        if (Auth::check()) {
            $cartCollection = \Cart::getContent();
            $data['cartCollection'] = $cartCollection;
            return view('site.product.checkout', $data);
        } else {


            return view('auth.login');
        }
    }
}
