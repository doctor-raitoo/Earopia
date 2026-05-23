<?php

namespace App\Controllers;

use App\Models\CartModel;

class CheckoutController extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $cartModel = new CartModel();

        $id_user = session()->get('id_user');

        $cart = $cartModel
            ->select('carts.*, produk.nama_produk, produk.harga')
            ->join('produk', 'produk.id_produk = carts.id_produk')
            ->where('carts.id_user', $id_user)
            ->findAll();

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        return view('checkout/index', [
            'cart' => $cart,
            'total' => $total
        ]);
    }

    public function process()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $cartModel = new \App\Models\CartModel();
        $transaksiModel = new \App\Models\TransaksiModel();
        $detailModel = new \App\Models\DetailTransaksiModel();

        $id_user = session()->get('id_user');

        $cart = $cartModel
            ->select('carts.*, produk.harga')
            ->join('produk', 'produk.id_produk = carts.id_produk')
            ->where('carts.id_user', $id_user)
            ->findAll();

        if (empty($cart)) {
            return redirect()->to('/cart');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        $file = $this->request->getFile('bukti');
        $namaFile = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $namaFile = $file->getRandomName();
            $file->move('uploads', $namaFile);
        }

        $transaksiModel->insert([
            'tanggal' => date('Y-m-d H:i:s'),
            'total' => $total,
            'status' => 'pending', 
            'status_barang' => 'diproses',
            'alamat' => $this->request->getPost('alamat'),
            'metode_pembayaran' => $this->request->getPost('metode_pembayaran'),
            'bukti_pembayaran' => $namaFile,
            'id_user' => $id_user
        ]);

        $id_transaksi = $transaksiModel->insertID();

        foreach ($cart as $item) {
            $detailModel->insert([
                'id_transaksi' => $id_transaksi,
                'id_produk' => $item['id_produk'],
                'jumlah' => $item['qty'],
                'harga' => $item['harga']
            ]);
        }

        $cartModel->where('id_user', $id_user)->delete();

        return redirect()->to('/invoice/' . $id_transaksi)
            ->with('success', 'Transaksi berhasil dibuat, menunggu verifikasi');
    }

    public function invoice($id)
    {
        $transaksiModel = new \App\Models\TransaksiModel();
        $detailModel = new \App\Models\DetailTransaksiModel();

        $transaksi = $transaksiModel
            ->where('id_transaksi', $id)
            ->first();

        if (!$transaksi) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan');
        }

        $detail = $detailModel
            ->select('detail_transaksi.*, produk.nama_produk')
            ->join('produk', 'produk.id_produk = detail_transaksi.id_produk')
            ->where('id_transaksi', $id)
            ->findAll();

        return view('checkout/invoice', [
            'transaksi' => $transaksi,
            'detail' => $detail
        ]);
    }
}