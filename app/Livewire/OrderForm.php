<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\OrderService;
use Livewire\Component;

class OrderForm extends Component
{
    public Product $product;
    public $orderData;
    public $subTotalAmount;
    public $promoCode = null;
    public $promoCodeId = null;
    public $quantity = 1;
    public $discount = 0;
    public $grandTotalAmount;
    public $totalDiscountAmount = 0;
    public $name;
    public $email;

    protected $orderService;

    public function boot(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function mount(Product $product, $orderData)
    {
        $this->product = $product;
        $this->orderData = $orderData;
        $this->subTotalAmount = $product->price;
        $this->grandTotalAmount = $product->price;
    }
    
    public function render()
    {
        return view('livewire.order-form');
    }
}
