<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingAddressModel extends Model
{
    protected $table            = 'shipping_address';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id',
        'fullname',
        'city',
        'area',
        'pincode',
        'address',
        'user_id',
        'created_at',
        'updated_at',
    ];
    // Callbacks
    protected $beforeInsert   = ['beforeInsert'];
    protected $beforeUpdate   = ['beforeUpdate'];

    // Date format for created_at column
    protected function beforeInsert(array $data)
    {
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    // Date format for updated_at column
    protected function beforeUpdate(array $data)
    {
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}
