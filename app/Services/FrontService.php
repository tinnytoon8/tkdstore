<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class FrontService
{
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository,
    CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function searchProducts(string $keyword)
    {
        return $this->productRepository->searchByName($keyword);
    }

    public function getFrontPageData()
    {
        $categories = $this->categoryRepository->getAllCategories();
        $popularProduct = $this->productRepository->getPopularProduct(5);
        $newProduct = $this->productRepository->getAllNewProduct();

        return compact('categories', 'popularProduct', 'newProduct');
    }
}