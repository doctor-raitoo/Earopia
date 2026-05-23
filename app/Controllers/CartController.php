<?php

namespace App\Controllers;

use App\Models\CartModel;

class CartController extends BaseController
{
    public function index()
    {
        $cartModel = new \App\Models\CartModel();

        $id_user = session()->get('id_user');

        $cart = $cartModel
            ->select('carts.*, produk.nama_produk, produk.harga, produk.gambar')
            ->join('produk', 'produk.id_produk = carts.id_produk')
            ->where('carts.id_user', $id_user)
            ->findAll();

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        return view('cart/index', [
            'cart' => $cart,
            'total' => $total
        ]);
    }
    public function add()
    {
        $cartModel = new CartModel();

        $id_user = session()->get('id_user');
        $id_produk = $this->request->getPost('id_produk');
        $qty = $this->request->getPost('qty');

        $existing = $cartModel
            ->where('id_user', $id_user)
            ->where('id_produk', $id_produk)
            ->first();

        if ($existing) {
            
            $cartModel->update($existing['id_cart'], [
                'qty' => $existing['qty'] + $qty
            ]);
        } else {

            $cartModel->insert([
                'id_user' => $id_user,
                'id_produk' => $id_produk,
                'qty' => $qty
            ]);
        }

        return redirect()->to('/produk')->with('success', 'Produk ditambahkan ke cart');
    }

    public function delete($id_cart)
    {
        $cartModel = new \App\Models\CartModel();

        $cartModel->delete($id_cart);

        return redirect()->to('/cart')->with('success', 'Item dihapus dari cart');
    }

    public function updateQty()
    {
        $cartModel = new \App\Models\CartModel();

        $id_cart = $this->request->getPost('id_cart');
        $qty = $this->request->getPost('qty');

        if ($qty <= 0) {
            $cartModel->delete($id_cart);
        } else {
            $cartModel->update($id_cart, [
                'qty' => $qty
            ]);
        }

        return redirect()->to('/cart');
    }
}