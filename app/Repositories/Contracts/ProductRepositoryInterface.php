<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getPopularProduct($limit);

    public function getAllNewProduct();

    public function find($id);
    
    public function getPrice($ticketId);

    public function searchByName(string $keyword);
}