<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbMProject extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'project_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'project_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'client_id' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'project_start' => [
                'type' => 'date',
            ],
            'project_end' => [
                'type' => 'date',
            ],
            'project_status' => [
                'type' => 'CHAR',
                'constraint' => '15',
            ],
        ]);
        $this->forge->addKey('project_id', true);
        $this->forge->addForeignKey('client_id', 'tb_m_client', 'client_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_m_project');
    }

    public function down()
    {
        $this->forge->dropTable('tb_m_project');
    }
}
