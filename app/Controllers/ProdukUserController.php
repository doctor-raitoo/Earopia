<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class ProdukUserController extends BaseController
{
    public function index()
    {
        $produkModel = new \App\Models\ProdukModel();
        $kategoriModel = new \App\Models\KategoriModel();

        $keyword = $this->request->getGet('search');
        $id_kategori = $this->request->getGet('kategori');
        $sort = $this->request->getGet('sort');

        $produkModel->select('produk.*, kategori.nama_kategori');
        $produkModel->join('kategori', 'kategori.id_kategori = produk.id_kategori');

        if ($id_kategori) {
            $produkModel->where('produk.id_kategori', $id_kategori);
        }

        if ($keyword) {
            $produkModel->groupStart()
                ->like('produk.nama_produk', $keyword)
                ->orLike('produk.deskripsi', $keyword)
                ->groupEnd();
        }

        if ($sort) {
            switch ($sort) {
                case 'harga_asc':
                    $produkModel->orderBy('produk.harga', 'ASC');
                    break;
                case 'harga_desc':
                    $produkModel->orderBy('produk.harga', 'DESC');
                    break;
                case 'nama_asc':
                    $produkModel->orderBy('produk.nama_produk', 'ASC');
                    break;
                case 'nama_desc':
                    $produkModel->orderBy('produk.nama_produk', 'DESC');
                    break;
            }
        }

        $data['produk'] = $produkModel->findAll();
        $data['kategori'] = $kategoriModel->findAll();

        $data['keyword'] = $keyword;
        $data['kategori_aktif'] = $id_kategori;
        $data['sort'] = $sort;

        return view('produk_user/index', $data);
    }

    public function detail($id)
    {
        $produkModel = new \App\Models\ProdukModel();

        $produk = $produkModel
            ->select('produk.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
            ->where('produk.id_produk', $id)
            ->first();

        if (!$produk) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        return view('produk_user/detail', [
            'produk' => $produk
        ]);
    }
}

