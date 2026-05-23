<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id_cart';

    protected $allowedFields = [
        'id_user',
        'id_produk',
        'qty',
        'created_at'
    ];
}