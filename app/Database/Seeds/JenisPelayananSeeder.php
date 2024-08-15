<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class JenisPelayananSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['jenis_pelayanan' => 'BPJS'],
            ['jenis_pelayanan' => 'Non-BPJS'],
        ];

        // Simple Queries
        $this->db->table('tb_jenis_pelayanan')->insertBatch($data);
    }
}
