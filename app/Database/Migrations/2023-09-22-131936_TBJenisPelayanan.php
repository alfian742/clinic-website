<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBJenisPelayanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'jenis_pelayanan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_jenis_pelayanan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_jenis_pelayanan');
    }
}
