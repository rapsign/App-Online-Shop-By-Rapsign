<?php

namespace App\Models;

use CodeIgniter\Model;

class VariationModel extends Model
{
    protected $table            = 'product_variation';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_id', 'size', 'color'];
}
