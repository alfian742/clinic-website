<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('JenisPelayananSeeder');
        $this->call('NamaPelayananSeeder');
        $this->call('PasienSeeder');
        $this->call('TenagaMedisSeeder');
        // $this->call('MasterSeeder');
    }
}
