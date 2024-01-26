<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

use App\Models\ProductModel;

class Home extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products1 = $productModel->findall(8);
        $products2 = $productModel->findAll(8, 8);
        $data = [
            'product1' => $products1,
            'product2' => $products2,
            'title'    => 'aa'
        ];
        return view('index', $data);
    }
}
