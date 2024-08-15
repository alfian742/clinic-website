<?php

namespace App\Models;

use CodeIgniter\Model;

class NamaPelayananModel extends Model
{
    protected $table = 'tb_nama_pelayanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_pelayanan', 'biaya'];

    // Definisikan relasi One-to-Many ke tabel 'tb_master'
    public function namaPelayanan()
    {
        return $this->hasMany(MasterModel::class, 'id_nama_pelayanan', 'id');
    }
}
