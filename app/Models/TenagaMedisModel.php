<?php

namespace App\Models;

use CodeIgniter\Model;

class TenagaMedisModel extends Model
{
    protected $table = 'tb_tenaga_medis';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'jabatan',
        'alamat',
        'no_telepon'
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    // Definisikan relasi One-to-Many ke tabel 'tb_master'
    public function tenagaMedis()
    {
        return $this->hasMany(MasterModel::class, 'id_tenaga_medis', 'id');
    }
}
