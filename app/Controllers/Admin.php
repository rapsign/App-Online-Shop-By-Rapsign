<?php

namespace App\Controllers;

use App\Models\BrandModel;
use App\Models\CategoriesModel;
use App\Models\ProductModel;
use App\Models\UsersModel;

class Admin extends BaseController
{

    public function index()
    {
        $userModel = new UsersModel();
        $productModel = new ProductModel();
        $member = $userModel->countAllMember();
        $product = $productModel->countAllproduct();
        $data = [
            'title'      => 'Gaming Store | Admin',
            'member'     => $member,
            'product'    => $product
        ];
        return view('admin/index', $data);
    }
    public function products()
    {
        $productModel    = new ProductModel();
        $products        = $productModel->findAll();

        $data = [
            'product'    => $products,
            'title'      => 'Gaming Store | Products'
        ];
        return view('admin/products', $data);
    }
    public function productsAddView()
    {
        $categoriesModel = new CategoriesModel();
        $brandsModel     = new BrandModel();
        $categories      = $categoriesModel->findAll();
        $brands          = $brandsModel->findAll();

        $data = [
            'categories' => $categories,
            'brands'     => $brands,
            'title'      => 'Gaming Store | Products'
        ];
        return view('admin/addProducts', $data);
    }
    public function productsAddProcess()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'product_name' => [
                'rules' => 'required|is_unique[products.product_name]',
                'errors' => [
                    'required' => 'The product name must be filled in',
                    'is_unique' => 'product names must be different'
                ]
            ],
            'product_price' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'The product price must be filled in',
                    'is_unique' => 'product price must be number, Example = 1000000'
                ]
            ],
            'product_stock' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'The product stock must be filled in',
                    'is_unique' => 'product stock must be number, Example = 100'
                ]
            ],
            'product_image' => [
                'rules' => 'uploaded[product_image]|max_size[product_image,1048]|max_dims[product_image,500,500]|is_image[product_image]|mime_in[product_image,image/jpg,image/jpeg/,image/png]',
                'errors' => [
                    'uploaded' => 'The product image must be choosed',
                    'max_dims' => 'Maximum image dimensions 500x500',
                    'is_image' => 'File must be image',
                    'mime_in'  => 'File must be image',
                    'max_size' => 'Image size max 1Mb'
                ]
            ],
            'categories_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The product category must be filled in',
                ]
            ],
            'brands_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'The product brand must be filled in',
                ]
            ],
        ]);
        if ($validation->withRequest($this->request)->run()) {
            $getImage = $this->request->getFile('product_image');
            $nameImageRandom = $getImage->getRandomName();
            $getImage->move('assets/images/product', $nameImageRandom);
            $data = [
                'product_name' => $this->request->getVar('product_name'),
                'slug' => url_title($this->request->getVar('product_name'), '-', TRUE),
                'product_price' => $this->request->getVar('product_price'),
                'product_stock' => $this->request->getVar('product_stock'),
                'product_image' => $nameImageRandom,
                'categories_id' => $this->request->getVar('categories_id'),
                'brands_id' => $this->request->getVar('brands_id'),
                'product_description' => $this->request->getVar('product_description'),
            ];
            $productModel = new ProductModel();
            $productModel->save($data);
            session()->setFlashdata('success', 'Product Added');
            return redirect()->to('admin/products');
        } else {
            $errors = $validation->getErrors();
            return redirect()->to('/admin/products/add')->withInput()->with('errors', $errors);
        }
    }
    public function productsDelete($id)
    {
        $productModel = new ProductModel();
        $findImgById = $productModel->find($id);
        unlink('assets/images/product/' . $findImgById['product_image']);
        $productModel->delete($id);
        session()->setFlashdata('danger', 'Product deleted');
        return redirect()->to('/admin/products');
    }

    public function categories()
    {
        $categoriesModel = new CategoriesModel();
        $categories      = $categoriesModel->findAll();
        $validation      = \Config\Services::validation();
        $data = [
            'categories' => $categories,
            'title'      => 'Gaming Store | Categories',
            'validation' => $validation
        ];
        return view('admin/categories', $data);
    }
    public function categoriesAdd()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'categories_name' => [
                'rules' => 'required|is_unique[categories.categories_name]',
                'errors' => [
                    'required' => 'The category name must be filled in',
                    'is_unique' => 'category names must be different'
                ]
            ]
        ]);
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'categories_name' => $this->request->getVar('categories_name')
            ];
            $categoriesModel = new CategoriesModel();
            $categoriesModel->save($data);
            session()->setFlashdata('success', 'Category Added');
            return redirect()->to('admin/categories');
        } else {
            return redirect()->to('admin/categories')->withInput()->with('errors', $validation->getErrors());
        }
    }
    public function categoriesDelete($id)
    {
        $categoriesModel = new CategoriesModel();
        $categoriesModel->delete($id);
        session()->setFlashdata('danger', 'Category deleted');
        return redirect()->to('admin/categories');
    }
    public function categoriesEdit($id)
    {
        $categoriesModel = new CategoriesModel();
        $categoriesModel->save([
            'id' => $id,
            'categories_name' => $this->request->getVar('categories_name')
        ]);
        session()->setFlashdata('success', 'Category Changed');
        return redirect()->to('admin/categories');
    }
    public function brands()
    {
        $brandsModel     = new BrandModel();
        $brands      = $brandsModel->findAll();
        $validation      = \Config\Services::validation();
        $data = [
            'brands'     => $brands,
            'title'      => 'Gaming Store | Brands',
            'validation' => $validation
        ];
        return view('admin/brands', $data);
    }
    public function brandsAdd()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'brands_name' => [
                'rules' => 'required|is_unique[brands.brands_name]',
                'errors' => [
                    'required' => 'The brand name must be filled in',
                    'is_unique' => 'brand names must be different'
                ]
            ]
        ]);
        if ($validation->withRequest($this->request)->run()) {
            $data = [
                'brands_name' => $this->request->getVar('brands_name')
            ];
            $brandsModel = new BrandModel();
            $brandsModel->save($data);
            session()->setFlashdata('success', 'Brand Added');
            return redirect()->to('admin/brands');
        } else {
            return redirect()->to('admin/brands')->withInput()->with('errors', $validation->getErrors());
        }
    }
    public function brandsDelete($id)
    {
        $brandsModel = new BrandModel();
        $brandsModel->delete($id);
        session()->setFlashdata('danger', 'Brand deleted');
        return redirect()->to('admin/brands');
    }
    public function brandsEdit($id)
    {
        $brandsModel = new BrandModel();
        $brandsModel->save([
            'id' => $id,
            'brands_name' => $this->request->getVar('brands_name')
        ]);
        session()->setFlashdata('success', 'Brand Changed');
        return redirect()->to('admin/brands');
    }
}
