<?php

namespace App\Controllers;

use App\Models\MatkulModel;

class MatkulController extends BaseController
{
    protected $matkulModel;
    private $rules;

    public function __construct()
    {
        $this->matkulModel = new MatkulModel();
        $this->rules = [
            'id_matkul' => [
                'rules' => 'required|is_unique[matakuliah.id_matkul]|exact_length[6]',
                'errors' => [
                    'required' => 'ID mata kuliah harus diisi.',
                    'is_unique' => 'ID mata kuliah sudah terdaftar.',
                    'exact_length' => 'ID mata kuliah harus terdiri dari {param} karakter.'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Nama mata kuliah harus diisi.',
                    'max_length' => 'Nama mata kuliah harus kurang dari {param} karakter.'
                ]
            ],

            'semester' => [
                'rules' => 'required|less_than_equal_to[8]|greater_than_equal_to[1]|integer',
                'errors' => [
                    'required' => 'Semester harus diisi.',
                    'less_than_equal_to' => 'Semester tidak boleh kurang dari {param}.',
                    'greater_than_equal_to' => 'Semester harus lebih dari {param}.',
                    'integer' => 'Input semester harus berupa angka.'
                ]
            ],

            'sks' => [
                'rules' => 'required|max_length[1]|integer',
                'errors' => [
                    'required' => 'SKS harus diisi.',
                    'max_length' => 'SKS harus terdiri dari {param} angka.'
                ]
            ],
            'kehadiran' => [
                'rules' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]|integer',
                'errors' => [
                    'required' => 'Nilai kehadiran harus diisi.',
                    'less_than_equal_to' => 'Nilai kehadiran tidak boleh lebih dari {param}.',
                    'greater_than_equal_to' => 'Nilai kehadiran harus lebih dari atau sama dengan {param}.',
                    'integer' => 'Input nilai kehadiran harus berupa angka.'
                ]
            ],
            'tugas' => [
                'rules' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]|integer',
                'errors' => [
                    'required' => 'Nilai tugas harus diisi.',
                    'less_than_equal_to' => 'Nilai tugas tidak boleh lebih dari {param}.',
                    'greater_than_equal_to' => 'Nilai tugas harus lebih dari atau sama dengan {param}.',
                    'integer' => 'Input nilai tugas harus berupa angka.'
                ]
            ],
            'kuis' => [
                'rules' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]|integer',
                'errors' => [
                    'required' => 'Nilai kuis harus diisi.',
                    'less_than_equal_to' => 'Nilai kuis tidak boleh lebih dari {param}.',
                    'greater_than_equal_to' => 'Nilai kuis harus lebih dari atau sama dengan {param}.',
                    'integer' => 'Input nilai kuis harus berupa angka.'
                ]
            ],
            'uts' => [
                'rules' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]|integer',
                'errors' => [
                    'required' => 'Nilai UTS harus diisi.',
                    'less_than_equal_to' => 'Nilai UTS tidak boleh lebih dari {param}.',
                    'greater_than_equal_to' => 'Nilai UTS harus lebih dari atau sama dengan {param}.',
                    'integer' => 'Input nilai UTS harus berupa angka.'
                ]
            ],
            'uas' => [
                'rules' => 'required|less_than_equal_to[100]|greater_than_equal_to[0]|integer',
                'errors' => [
                    'required' => 'Nilai UAS harus diisi.',
                    'less_than_equal_to' => 'Nilai UAS tidak boleh lebih dari {param}.',
                    'greater_than_equal_to' => 'Nilai UAS harus lebih dari atau sama dengan {param}.',
                    'integer' => 'Input nilai UAS harus berupa angka.'
                ]
            ],
        ];
    }
    public function index()
    {
        $npm = session()->get('npm');
        $data = [
            'title' => 'Home | Transkrip App',
            'matkul' => [
                '1' => $this->matkulModel->where(['semester' => '1', 'npm' => $npm])->findAll(),
                '2' => $this->matkulModel->where(['semester' => '2', 'npm' => $npm])->findAll(),
                '3' => $this->matkulModel->where(['semester' => '3', 'npm' => $npm])->findAll(),
                '4' => $this->matkulModel->where(['semester' => '4', 'npm' => $npm])->findAll(),
                '5' => $this->matkulModel->where(['semester' => '5', 'npm' => $npm])->findAll(),
                '6' => $this->matkulModel->where(['semester' => '6', 'npm' => $npm])->findAll(),
                '7' => $this->matkulModel->where(['semester' => '7', 'npm' => $npm])->findAll(),
                '8' => $this->matkulModel->where(['semester' => '8', 'npm' => $npm])->findAll()
            ]
        ];
        // dd($data);
        return view('matkul/DataMatkulView', $data);
    }

    public function generateData($data)
    {
        $data = array_slice($data, 1, -1);
        $hasil = [
            'h_kehadiran' => $data['kehadiran'] * 10 / 100,
            'h_tugas' => $data['tugas'] * 20 / 100,
            'h_kuis' => $data['kuis'] * 20 / 100,
            'h_uts' => $data['uts'] * 25 / 100,
            'h_uas' => $data['uas'] * 25 / 100
        ];
        $nilaiAngka = array_sum($hasil);
        if ($nilaiAngka >= 80) {
            $nilaiHuruf = 'A';
        } elseif ($nilaiAngka >= 70) {
            $nilaiHuruf = 'B';
        } elseif ($nilaiAngka >= 60) {
            $nilaiHuruf = 'C';
        } elseif ($nilaiAngka >= 50) {
            $nilaiHuruf = 'D';
        } elseif ($nilaiAngka < 50) {
            $nilaiHuruf = 'E';
        }
        // dd(session()->get('npm'));
        $data = array_merge(array_slice($data, 0, 4), array('nilai' => $nilaiHuruf), array_slice($data, 4), $hasil, array('npm' => session()->get('npm')));
        return $data;
    }

    //Ke view tambah
    public function tambah()
    {
        session();
        $data = [
            'title' => 'Tambah Data | Transkrip App',
            'validation' => \Config\Services::validation()
        ];
        return view('matkul/TambahMatkulView', $data);
    }

    //Proses tambahnya
    public function simpan()
    {
        if (!$this->validate($this->rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/tambah')->withInput()->with('validation', $validation);
        }
        $data = $this->generateData($this->request->getPost());
        $this->matkulModel->insert($data);
        return redirect()->to('/');
    }

    //Ke view update
    public function update($id_matkul)
    {
        session();
        $data = [
            'title' => 'Tambah Data | Transkrip App',
            'validation' => \Config\Services::validation(),
            'matkul' => $this->matkulModel->find($id_matkul)
        ];
        return view('matkul/UbahMatkulView', $data);
    }

    //Proses updatenya
    public function ubah($id_matkul)
    {
        if ($id_matkul == $this->request->getPost('id_matkul')) {
            $rule_id = [
                'id_matkul' => [
                    'rules' => 'required|exact_length[6]',
                    'errors' => [
                        'required' => 'ID mata kuliah harus diisi.',
                        'exact_length' => 'ID mata kuliah harus terdiri dari {param} karakter.'
                    ]
                ]
            ];
            $this->rules = array_replace($this->rules, $rule_id);
        }
        if (!$this->validate($this->rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to('/update/' . $id_matkul)->withInput()->with('validation', $validation);
        }
        $data = $this->generateData($this->request->getPost());
        $this->matkulModel->update($id_matkul, $data);
        return redirect()->to('/');
    }

    //Proses hapus
    public function delete($id_matkul)
    {
        $this->matkulModel->delete($id_matkul);
        return redirect()->to('/');
    }
}
