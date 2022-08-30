<?php

namespace App\Models;

use CodeIgniter\Model;

class MatkulModel extends Model
{
    protected $table      = 'matakuliah';
    protected $primaryKey = 'id_matkul';
    protected $useAutoIncrement = false;
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'id_matkul', 'nama', 'semester', 'sks',
        'nilai', 'kehadiran', 'tugas', 'kuis', 'uts', 'uas',
        'h_kehadiran', 'h_tugas', 'h_kuis', 'h_uts', 'h_uas', 'npm'
    ];
    protected $useTimestamps = true;
}
