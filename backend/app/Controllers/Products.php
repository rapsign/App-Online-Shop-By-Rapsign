<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\ProductModel;
use App\Models\VariationModel;
use App\Models\UsersDetails;

class Products extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $productModel = new ProductModel();
        $data = $productModel->findAll();
        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($slug = null)
    {
        $productModel = new ProductModel();
        $variationModel = new VariationModel();
        $product = $productModel->findBySlug($slug);
        $productId = $product['id'];
        $variationColor = $variationModel->where('products_id', $productId)->findColumn('color');
        $variationSize = $variationModel->where('products_id', $productId)->findColumn('size');
        $data = [
            'product' => $product,
            'variationColor' => $variationColor,
            'variationSize' => $variationSize,
        ];
        if (!$data) return $this->failNotFound('No Data Found');
        return $this->respond($data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $request = $this->request->getJSON();
        $uuid = $request->sub;
        $userModel = new UsersDetails();
        $user = $userModel->where('uuid', $uuid)->first();

        if ($user) {
            return $this->respond($user, 200);
        } else {
            $newUserData = [
                'uuid' => $uuid,
            ];

            $userModel->insert($newUserData);

            return $this->respond($newUserData, 201);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
