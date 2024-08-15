<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
    protected $table = 'tb_master';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'id_pasien',
        'id_tenaga_medis',
        'id_nama_pelayanan',
        'id_jenis_pelayanan',
        'no_bpjs',
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';

    // Definisikan relasi ke model JenisPelayananModel
    public function jenisPelayanan()
    {
        return $this->belongsTo(JenisPelayananModel::class, 'id_jenis_pelayanan', 'id');
    }

    // Definisikan relasi ke model NamaPelayananModel
    public function namaPelayanan()
    {
        return $this->belongsTo(NamaPelayananModel::class, 'id_nama_pelayanan', 'id');
    }

    // Definisikan relasi ke model PasienModel
    public function pasien()
    {
        return $this->belongsTo(PasienModel::class, 'id_pasien', 'id');
    }

    // Definisikan relasi ke model TenagaMedisModel
    public function tenagaMedis()
    {
        return $this->belongsTo(TenagaMedisModel::class, 'id_tenaga_medis', 'id');
    }
}
