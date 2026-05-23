<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;

class AdminProdukController extends BaseController
{
    public function index()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/produk');
        }

        $produkModel = new ProdukModel();
        $kategoriModel = new KategoriModel();

        $data['produk'] = $produkModel
            ->select('produk.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = produk.id_kategori')
            ->findAll();

        $data['kategori'] = $kategoriModel->findAll();

        return view('admin/produk/index', $data);
    }

    public function store()
    {
        $model = new ProdukModel();

        $file = $this->request->getFile('gambar');
        $namaFile = null;

        if ($file && $file->isValid()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads', $namaFile);
        }

        $model->insert([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaFile
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function update($id)
    {
        $model = new ProdukModel();

        $file = $this->request->getFile('gambar');
        $namaFile = $this->request->getPost('gambar_lama');

        if ($file && $file->isValid()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads', $namaFile);
        }

        $model->update($id, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'harga' => $this->request->getPost('harga'),
            'stok' => $this->request->getPost('stok'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaFile
        ]);

        return redirect()->back()->with('success', 'Produk berhasil diupdate');
    }

    public function delete($id)
    {
        $model = new ProdukModel();
        $model->delete($id);

        return redirect()->back()->with('success', 'Produk dihapus');
    }
}