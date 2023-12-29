<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Item extends BaseController
{
    public function index($slug): string
    {
        $productModel = new ProductModel();
        $products1 = $productModel->findAll();
        $products = $productModel->findBySlug($slug);
        $data = [
            'title'  => $products['product_name'],
            'product' => $products,
            'product1' => $products1,
        ];
        return view('item', $data);
    }
}
