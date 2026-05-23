<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';

    protected $allowedFields = [
        'tanggal',
        'total',
        'status',
        'status_barang',
        'alamat',
        'metode_pembayaran',
        'bukti_pembayaran',
        'id_user'
    ];
}