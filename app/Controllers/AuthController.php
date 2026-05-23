<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function processLogin()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user) {
            if ($password == $user['password']) {

                session()->set([
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);

                return redirect()->to('/produk');
            }
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        $userModel = new \App\Models\UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'), // tanpa hash
            'role' => 'user',
            'status' => 'active'
        ];

        $userModel->insert($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login');
    }
}