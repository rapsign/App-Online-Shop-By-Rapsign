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
        $brandsModel     = new BrandModel();
        $productModel    = new ProductModel();
        $brands          = $brandsModel->findAll();
        $categories      = $categoriesModel->findAll();
        $products        = $productModel->findAll();

        $data = [
            'brands'     => $brands,
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
        $brandsModel     = new BrandModel();
        $getId           = $categoriesModel->where('categories_name', $category)->findColumn('id');
        $categories      = $categoriesModel->findAll();
        $brands          = $brandsModel->findAll();
        $products        = $productModel->where('categories_id', $getId)->findAll();
        $data = [
            'product'    => $products,
            'categories' => $categories,
            'brands'     => $brands,
            'title'      => 'Gaming Store | Product'
        ];
        return view('product', $data);
    }
    public function brands($brand)
    {
        $brandsModel     = new BrandModel();
        $categoriesModel = new CategoriesModel();
        $productModel    = new ProductModel();
        $getId           = $brandsModel->where('brands_name', $brand)->findColumn('id');
        $brands          = $brandsModel->findAll();
        $categories      = $categoriesModel->findAll();
        $products        = $productModel->where('brands_id', $getId)->findAll();
        $data = [
            'product'    => $products,
            'categories' => $categories,
            'brands'     => $brands,
            'title'      => 'Gaming Store | Product'
        ];
        return view('product', $data);
    }
}
