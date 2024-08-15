<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;
use App\Models\PasienModel;
use App\Models\TenagaMedisModel;

class MasterSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create();

        $PasienModel = new PasienModel();
        $TenagaMedisModel = new TenagaMedisModel();

        // Mengambil semua id kemudian dijadikan array
        $idPasien = $PasienModel->select('id')->get()->getResultArray();
        $idTenagaMedis = $TenagaMedisModel->select('id')->get()->getResultArray();

        for ($i = 0; $i < 50; $i++) {
            $idJenisPelayanan = $faker->numberBetween(1, 2);

            if ($idJenisPelayanan == 1) {
                $noBpjs = $faker->unique()->numerify('#############');
            } else {
                $noBpjs = '-';
            }

            $data = [
                'id' => 'MR' . $faker->unique()->randomNumber(5),
                'id_pasien' => $faker->randomElement($idPasien),
                'id_tenaga_medis' => $faker->randomElement($idTenagaMedis),
                'id_nama_pelayanan' => $faker->numberBetween(1, 10),
                'id_jenis_pelayanan' => $idJenisPelayanan,
                'no_bpjs' => $noBpjs,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now('Asia/Singapore', 'en_US'),
            ];

            $this->db->table('tb_master')->insert($data);
        }
    }
}
