<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisPelayananModel extends Model
{
    protected $table = 'tb_jenis_pelayanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['jenis_pelayanan'];

    // Definisikan relasi One-to-Many ke tabel 'tb_master'
    public function jenisPelayanan()
    {
        return $this->hasMany(MasterModel::class, 'id_jenis_pelayanan', 'id');
    }
}
