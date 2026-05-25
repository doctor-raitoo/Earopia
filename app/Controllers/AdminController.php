<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/produk');
        }

        $transaksiModel = new \App\Models\TransaksiModel();
        $produkModel = new \App\Models\ProdukModel();
        $userModel = new \App\Models\UserModel();

        $totalTransaksi = $transaksiModel->countAll();

        $totalPendapatan = $transaksiModel
            ->selectSum('total')
            ->where('status', 'dibayar')
            ->first()['total'] ?? 0;

        $totalProduk = $produkModel->countAll();

        $totalUser = $userModel
            ->where('role', 'user')
            ->countAllResults();

        $grafik = $transaksiModel
            ->select("DATE(tanggal) as tgl, COUNT(*) as jumlah")
            ->groupBy("DATE(tanggal)")
            ->orderBy("tgl", "ASC")
            ->findAll();

        return view('admin/dashboard', [
            'totalTransaksi' => $totalTransaksi,
            'totalPendapatan' => $totalPendapatan,
            'totalProduk' => $totalProduk,
            'totalUser' => $totalUser,
            'grafik' => $grafik
        ]);
    }
    public function transaksi()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/produk');
        }

        $model = new TransaksiModel();

        $data['transaksi'] = $model
        ->select('transaksi.*, users.username')
        ->join('users', 'users.id_user = transaksi.id_user')
        ->orderBy('id_transaksi', 'DESC')
        ->findAll();

        return view('admin/transaksi', $data);
    }

    public function verifikasi($id)
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/produk');
        }

        $model = new TransaksiModel();

        $model->update($id, [
            'status' => 'dibayar'
        ]);

        return redirect()->to('/admin/transaksi')->with('success', 'Pembayaran berhasil diverifikasi');
    }

    public function updateStatusBarang($id, $status)
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/produk');
        }

        $model = new TransaksiModel();

        $model->update($id, [
            'status_barang' => $status
        ]);

        return redirect()->to('/admin/transaksi');
    }

    public function detail($id)
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/produk');
        }

        $transaksiModel = new \App\Models\TransaksiModel();
        $detailModel = new \App\Models\DetailTransaksiModel();

        $transaksi = $transaksiModel
            ->select('transaksi.*, users.username')
            ->join('users', 'users.id_user = transaksi.id_user')
            ->where('id_transaksi', $id)
            ->first();

        $detail = $detailModel
            ->select('detail_transaksi.*, produk.nama_produk')
            ->join('produk', 'produk.id_produk = detail_transaksi.id_produk')
            ->where('id_transaksi', $id)
            ->findAll();

        return view('admin/transaksi_detail', [
            'transaksi' => $transaksi,
            'detail' => $detail
        ]);
    }
}