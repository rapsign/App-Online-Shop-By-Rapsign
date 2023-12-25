<?php

namespace App\Controllers;

use App\Models\ProductModel;

class CheckOut extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "f2df69c9dd6baae6d19c3bc78974b5d2";

    public function index($id): string
    {
        $province = $this->rajaongkir('province');
        $productModel = new ProductModel();
        $qty = $this->request->getVar('qty');
        $products = $productModel->find($id);
        $productPrice = $productModel->where('id', $id)->findColumn('product_price');
        $subTotal = array_product($productPrice) * intval($qty);
        $data = [
            'title' => 'Gaming Store || Check out',
            'provinsi' => json_decode($province)->rajaongkir->results
        ];
        $orderData = [
            'item'  => $products,
            'quantity' => $qty,
            'subTotal' => $subTotal,
        ];
        session()->set('orderData', $orderData);
        return view('checkout', $data);
    }
    public function getCity()
    {
        if ($this->request->isAJAX()) {
            $id_province = $this->request->getGET('id_province');
            $data = $this->rajaongkir('city', $id_province);
            return $this->response->setJSON($data);
        }
    }
    public function getCost()
    {
        if ($this->request->isAJAX()) {
            $origin = $this->request->getGET('origin');
            $destination = $this->request->getGET('destination');
            $weight = $this->request->getGET('weight');
            $courier = $this->request->getGET('courier');
            $data = $this->rajaongkircost($origin, $destination, $weight, $courier);
            return $this->response->setJSON($data);
        }
    }
    private function rajaongkircost($origin, $destination, $weight, $courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->apiKey,
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        return $response;
    }
    private function rajaongkir($method, $id_province = null)
    {

        $endPoint = $this->url . $method;

        if ($id_province != null) {
            $endPoint = $endPoint . "?province=" . $id_province;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }
}
