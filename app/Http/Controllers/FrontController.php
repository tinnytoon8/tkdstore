<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');

    //     $products = $this->frontService->searchProducts($keyword);

    //     return view('front.search', [
    //         'products' => $products,
    //         'keyword' => $keyword,
    //     ]);
    // }

    public function search(Request $request)
{
    $keyword = $request->input('keyword', ''); // Default ke string kosong jika null

    $products = $this->frontService->searchProducts($keyword);
    // dd($products);

    return view('front.search', [
        'products' => $products,
        'keyword' => $keyword,
    ]);
}


    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', $data);
    }

    public function details(Product $product)
    {
        return view('front.details', compact('product'));
    }

    public function category(Category $category)
    {
        return view('front.category', compact('category'));
    }
}
