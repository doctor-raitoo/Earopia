<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $produk = $db->table('produk')
        ->select('produk.*, kategori.nama_kategori')
        ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
        ->orderBy('id_produk', 'DESC')
        ->limit(8)
        ->get()
        ->getResultArray();

        return view('home/index', [
            'produk' => $produk
        ]);
    }
}
