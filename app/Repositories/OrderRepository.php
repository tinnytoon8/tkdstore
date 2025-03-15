<?php

namespace App\Repositories;

use App\Models\ProductTransaction;
use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Support\Facades\Session;

class OrderRepository implements OrderRepositoryInterface
{
    public function createTransaction(array $data)
    {
        return ProductTransaction::create($data);
    }

    public function findByTrxAndPhoneNumber($bookingTrxId, $phoneNumber)
    {
        return ProductTransaction::where('booking_trx_id', $bookingTrxId)
                                    ->where('phone', $phoneNumber)
                                    ->first();
    }

    public function saveToSession(array $data)
    {
        Session::put('orderData', $data);
    }

    public function getOrderDataFromSession()
    {
        return session('orderData', []);
    }

    public function updateSessionData(array $data)
    {
        $orderData = session('orderData', []);
        $orderData = array_merge($orderData, $data);
        session(['orderData' => $orderData]);
    }

    public function clearSession()
    {
        Session::forget('orderData');
    }
}