<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NamaPelayananSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_pelayanan' => 'Medical Check Up',
                'biaya' => 750000,
            ],
            [
                'nama_pelayanan' => 'Radiologi',
                'biaya' => 500000,
            ],
            [
                'nama_pelayanan' => 'THT',
                'biaya' => 150000,
            ],
            [
                'nama_pelayanan' => 'Gigi',
                'biaya' => 200000,
            ],
            [
                'nama_pelayanan' => 'Kebidanan',
                'biaya' => 300000,
            ],
            [
                'nama_pelayanan' => 'Bedah Umum',
                'biaya' => 600000,
            ],
            [
                'nama_pelayanan' => 'Mata',
                'biaya' => 250000,
            ],
            [
                'nama_pelayanan' => 'Pediatri',
                'biaya' => 200000,
            ],
            [
                'nama_pelayanan' => 'Penyakit Dalam',
                'biaya' => 350000,
            ],
            [
                'nama_pelayanan' => 'Fisioterapi',
                'biaya' => 400000,
            ],
        ];

        // Simple Queries
        $this->db->table('tb_nama_pelayanan')->insertBatch($data);
    }
}
