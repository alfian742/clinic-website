<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TBMaster extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 7,
            ],
            'id_pasien' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_tenaga_medis' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_nama_pelayanan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'id_jenis_pelayanan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'no_bpjs' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // ON UPDATE CASCADE ON DELETE SET NULL
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('id_pasien', 'tb_pasien', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_tenaga_medis', 'tb_tenaga_medis', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_nama_pelayanan', 'tb_nama_pelayanan', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('id_jenis_pelayanan', 'tb_jenis_pelayanan', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('tb_master');
    }

    public function down()
    {
        $this->forge->dropTable('tb_master');
    }
}
