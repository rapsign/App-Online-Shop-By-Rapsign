<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['product_name', 'product_price', 'product_stock', 'product_description', 'product_sold', 'product_image', 'slug', 'categories_id', 'brands_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function findBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
    public function countAllProduct()
    {
        return $this->db->table('products')->countAll();
    }
}
