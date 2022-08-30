<?php

namespace App\Controllers;

use App\Models\AuthModel;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }
    public function index()
    {
        if (session()->get('npm')) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => 'Login | Transkrip App'
        ];
        return view('auth/LoginView', $data);
    }

    public function login()
    {
        $dataUser = $this->AuthModel->where('npm', $this->request->getPost('npm'))->first();
        if ($dataUser) {
            if (password_verify($this->request->getPost('password'), $dataUser['password'])) {
                session()->set([
                    'npm' => $dataUser['npm'],
                    'nama' => $dataUser['nama'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Username atau Password Salah');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function register()
    {
        if (session()->get('npm')) {
            return redirect()->to('/dashboard');
        }
        session();
        $data = [
            'title' => 'Register | Transkrip App',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/RegisterView', $data);
    }

    public function simpan()
    {
        $rules = [
            'npm' => [
                'rules' => 'required|is_unique[mahasiswa.npm]|exact_length[6]',
                'errors' => [
                    'required' => 'NPM harus diisi.',
                    'is_unique' => 'NPM sudah terdaftar.',
                    'exact_length' => 'NPM harus terdiri dari {param} karakter.'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]',
                'errors' => [
                    'required' => 'Password harus diisi.',
                    'min_length' => 'Password harus lebih dari {param} karakter.'
                ]
            ],
            'upassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi Password harus diisi.',
                    'matches' => 'Konfirmasi Password tidak sama dengan Password.'
                ]
            ],
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Program Studi harus diisi.'
                ]
            ],
            'fakultas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fakultas harus diisi.'
                ]
            ],
            'tahun_masuk' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Tahun Masuk harus diisi.',
                    'numberic' => 'Tahun Masuk harus berupa angka.'
                ]
            ],
            'jenjang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenjang harus diisi.'
                ]
            ],
        ];
        $data = $this->request->getPost();
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/register')->withInput()->with('validation', $validation);
        }
        unset($data['upassword']);
        $this->AuthModel->insert($data);
        return redirect()->to('/');
    }
}
