<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;

class PasienSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        $pekerjaan = [
            'TNI/POLRI', 'PNS', 'Pelajar/Mahasiswa', 'Pegawai BUMN', 'Pegawai BUMS', 'Wiraswasta', 'Petani', 'Buruh', 'Tidak Bekerja',
        ];

        for ($i = 0; $i < 100; $i++) {
            $data = [
                'id' => $faker->unique()->randomNumber(9),
                'nama' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha', 'Konghuchu']),
                // 'pekerjaan' => $faker->jobTitle,
                'pekerjaan' => $faker->randomElement($pekerjaan),
                'alamat' => $faker->address,
                'no_telepon' => $faker->phoneNumber,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now('Asia/Singapore', 'en_US'),
            ];

            $this->db->table('tb_pasien')->insert($data);
        }
    }
}
