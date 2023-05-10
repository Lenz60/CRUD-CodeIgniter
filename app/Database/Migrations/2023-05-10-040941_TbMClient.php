<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMClient extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'client_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'client_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'client_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('client_id', true);
        $this->forge->createTable('tb_m_client');
    }

    public function down()
    {
        $this->forge->dropTable('tb_m_client');
    }
}
