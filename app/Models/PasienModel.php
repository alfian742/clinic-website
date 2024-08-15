<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model
{
    protected $table = 'tb_pasien';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'alamat',
        'no_telepon'
    ];
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    // Definisikan relasi One-to-Many ke tabel 'tb_master'
    public function pasien()
    {
        return $this->hasMany(MasterModel::class, 'id_pasien', 'id');
    }
}
