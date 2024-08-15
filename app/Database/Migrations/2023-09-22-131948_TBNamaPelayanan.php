<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBNamaPelayanan extends Migration
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
            'nama_pelayanan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'biaya' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_nama_pelayanan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_nama_pelayanan');
    }
}
