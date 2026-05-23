<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\DetailTransaksiModel;

class TransaksiUserController extends BaseController
{
    public function index()
    {
        if (!session()->get('id_user')) {
            return redirect()->to('/login');
        }

        $model = new TransaksiModel();

        $data['transaksi'] = $model
            ->where('id_user', session()->get('id_user'))
            ->orderBy('id_transaksi', 'DESC')
            ->findAll();

        return view('transaksi_user/index', $data);
    }

    public function detail($id)
    {
        if (!session()->get('id_user')) {
            return redirect()->to('/login');
        }

        $transaksiModel = new TransaksiModel();
        $detailModel = new DetailTransaksiModel();

        $transaksi = $transaksiModel
            ->where('id_transaksi', $id)
            ->where('id_user', session()->get('id_user'))
            ->first();

        if (!$transaksi) {
            return redirect()->to('/transaksi-saya');
        }

        $detail = $detailModel
            ->select('detail_transaksi.*, produk.nama_produk')
            ->join('produk', 'produk.id_produk = detail_transaksi.id_produk')
            ->where('id_transaksi', $id)
            ->findAll();

        return view('transaksi_user/detail', [
            'transaksi' => $transaksi,
            'detail' => $detail
        ]);
    }
}