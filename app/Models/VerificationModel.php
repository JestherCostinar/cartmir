<?php

namespace App\Models;

use CodeIgniter\Model;

class VerificationModel extends Model
{
    protected $table            = 'account_verification';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'id',
        'user_id',
        'verification_code',
        'otp_expiry'
    ];

    // Callback
    protected $beforeInsert   = ['beforeInsert'];

    // Date format for otp expiry
    protected function beforeInsert(array $data)
    {
        $data['data']['otp_expiry'] = date('Y-m-d', strtotime("+1 day"));
        $data['data']['verification_code'] = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        return $data;
    }
}
