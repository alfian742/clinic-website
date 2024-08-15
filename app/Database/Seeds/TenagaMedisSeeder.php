<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use CodeIgniter\I18n\Time;

class TenagaMedisSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        $jabatanTenagaKesehatan = [
            'Dokter', 'Perawat', 'Apoteker', 'Bidan', 'Ahli Gizi', 'Farmasis', 'Radiografer', 'Analis Kesehatan',
            'Psikolog Klinis', 'Fisioterapis', 'Dokter Gigi', 'Dokter Spesialis', 'Konselor Kesehatan', 'Terapis Okupasi',
            'Ahli Terapi Wicara', 'Dokter Umum', 'Dokter Internist', 'Dokter Bedah', 'Perawat Anestesi', 'Dokter Kandungan',
            'Perawat Gigi', 'Asisten Apoteker', 'Dokter Hewan', 'Dokter Spesialis Bedah', 'Dokter Spesialis Kandungan',
        ];

        for ($i = 0; $i < 20; $i++) {
            $data = [
                'id' => $faker->unique()->randomNumber(9),
                'nama' => $faker->name,
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama' => $faker->randomElement(['Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha', 'Konghuchu']),
                'jabatan' => $faker->randomElement($jabatanTenagaKesehatan),
                'alamat' => $faker->address,
                'no_telepon' => $faker->phoneNumber,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now('Asia/Singapore', 'en_US'),
            ];

            $this->db->table('tb_tenaga_medis')->insert($data);
        }
    }
}
