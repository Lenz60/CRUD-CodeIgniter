<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbMClient extends Seeder
{
    public function run()
    {
        $data = [
            [
                'client_name'    => 'NEC',
                'client_address'    => 'Jakarta',
            ],
            [
                'client_name'    => 'TAM',
                'client_address'    => 'Jakarta',
            ],
            [
                'client_name'    => 'TUA',
                'client_address'    => 'Bandung',
            ],
        ];
        // Using Query Builder
        // dd($data);
        $this->db->table('tb_m_client')->insertBatch($data);
    }
}
