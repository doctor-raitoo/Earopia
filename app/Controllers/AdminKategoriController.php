<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class AdminKategoriController extends BaseController
{
    public function index()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/produk');
        }

        $model = new KategoriModel();

        $data['kategori'] = $model->findAll();

        return view('admin/kategori/index', $data);
    }

    public function store()
    {
        $model = new KategoriModel();

        $model->insert([
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->back()->with('success', 'Kategori ditambahkan');
    }

    public function update($id)
    {
        $model = new KategoriModel();

        $model->update($id, [
            'nama_kategori' => $this->request->getPost('nama_kategori')
        ]);

        return redirect()->back()->with('success', 'Kategori diupdate');
    }

    public function delete($id)
    {
        $model = new KategoriModel();
        $model->delete($id);

        return redirect()->back()->with('success', 'Kategori dihapus');
    }
}

