<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\CategoriesModel;

class Product extends BaseController
{
    public function index(): string
    {
        $categoriesModel = new CategoriesModel();
        $productModel    = new ProductModel();
        $categories      = $categoriesModel->findAll();
        $products        = $productModel->findAll();

        $data = [
            'product'    => $products,
            'categories' => $categories,
            'title'      => 'Gaming Store | Product'
        ];
        return view('product', $data);
    }
    public function categories($category)
    {
        $categoriesModel = new CategoriesModel();
        $productModel    = new ProductModel();
        $getId         = $categoriesModel->where('categories_name', $category)->findColumn('id');
        $categories      = $categoriesModel->findAll();
        $products        = $productModel->where('categories_id', $getId)->findAll();
        $data = [
            'product'    => $products,
            'categories' => $categories,
            'title'      => 'Gaming Store | Product'
        ];
        return view('product', $data);
    }
}
