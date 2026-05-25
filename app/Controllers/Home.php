<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $produk = $db->table('produk')
            ->orderBy('id_produk', 'DESC')
            ->limit(6)
            ->get()
            ->getResultArray();

        return view('home/index', [
            'produk' => $produk
        ]);
    }
}
