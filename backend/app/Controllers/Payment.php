<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Midtrans;
use App\Models\ProductModel;

class Payment extends BaseController
{
    public function index()

    {
        $itemData = session()->get('orderData');
        $midtransConfig = new Midtrans();
        \Midtrans\Config::$serverKey = $midtransConfig->serverKey;
        \Midtrans\Config::$isProduction = $midtransConfig->isProduction;
        $fullname = $this->request->getVar('fullname');
        $address = $this->request->getVar('address');
        $province = $this->request->getVar('province');
        $city = $this->request->getVar('city');
        $phone_number = $this->request->getVar('phone_number');
        $email = $this->request->getVar('email');
        $notes = $this->request->getVar('notes');
        $total = $this->request->getVar('total');
        $shippingPrice = $this->request->getVar('shipPrice');
        $service = $this->request->getVar('service');
        $estimation = $this->request->getVar('estimation');
        $orderId = rand();
        $userData = [
            "orderId" => $orderId,
            "fullname" => $fullname,
            "address" => $address,
            "province" => $province,
            "city" => $city,
            "phone_number" => $phone_number,
            "email" => $email,
            "notes" => $notes,
            "total" => $total,
            "shippingPrice" => $shippingPrice,
            "service" => $service,
            "estimation" => $estimation
        ];
        $mergeSession = array_merge($itemData, $userData);
        session()->set('orderData', $mergeSession);

        $transaction_details = array(
            'order_id' => $orderId,
            'gross_amount' => $total,
        );
        $billing_address = array(
            'first_name'    => $fullname,
            'address'       => $address,
            'city'          => $city,
            'phone'         => $phone_number,
            'country_code'  => 'IDN'
        );
        $shipping_address = array(
            'first_name'    => $fullname,
            'address'       => $address,
            'city'          => $city,
            'phone'         => $phone_number,
            'country_code'  => 'IDN'
        );
        $customer_details = array(
            'first_name'    => $fullname,
            'email'         => $email,
            'phone'         => $phone_number,
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );
        $transaction = array(
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        );
        $snapToken = \Midtrans\Snap::getSnapToken($transaction);
        return redirect()->to('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $snapToken);
    }

    public function paymentSuccess()
    {
        $orderData = session()->get('orderData');
        dd($orderData);
    }
}
