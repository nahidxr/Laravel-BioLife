<?php

namespace App\Http\Controllers\site;

use App\Models\Review;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Interfaces\IProductRepository;
use App\Interfaces\ICategoryRepository;


class HomeController extends Controller
{
    protected $productRepo;
    protected $categoryRepo;

    public function __construct(IProductRepository $productRepo, ICategoryRepository $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }


    public function index()
    {
        $data["latest_products"] = $this->productRepo->GetLatestProductList();
        $data["special_products"] = $this->productRepo->GetSpecialProductList();

        $cartCollection = \Cart::getContent();
        $data['cartCollection'] = $cartCollection;

        // $data["random_products"]= $this->productRepo->GetRandomProductList();
        return view('site.home', $data);
    }
    public function product($id)
    {
        $product = $this->productRepo->myFind($id);
        $data["product"] = $product;
        $cartCollection = \Cart::getContent();
        $data['cartCollection'] = $cartCollection;
        // $data["review_list"] = Review::get();

        $data["review_list"] = DB::table('reviews')
            ->where('status', '=', 1)
            ->where('Product_id', '=', $id)

            ->get();


        return view('site.product.single', $data);
    }
}
