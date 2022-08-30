<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'npm';
    protected $useAutoIncrement = false;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'npm', 'nama', 'password', 'prodi', 'fakultas', 'tahun_masuk'
    ];
    protected $useTimestamps = true;
}
