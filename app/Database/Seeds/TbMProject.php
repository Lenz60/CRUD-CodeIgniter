<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TbMProject extends Seeder
{
    public function run()
    {
        $data = [
            [
                'project_id' => '1',
                'project_name'    => 'WMS',
                'client_id'    => '1',
                'project_start'    => '2022-07-28',
                'project_end'    => '2022-08-28',
                'project_status'    => 'OPEN',
            ],
            [
                'project_id' => '2',
                'project_name'    => 'FILMS',
                'client_id'    => '2',
                'project_start'    => '2022-06-01',
                'project_end'    => '2022-08-31',
                'project_status'    => 'DOING',
            ],
            [
                'project_id' => '3',
                'project_name'    => 'DOC',
                'client_id'    => '2',
                'project_start'    => '2022-01-01',
                'project_end'    => '2022-04-30',
                'project_status'    => 'DONE',
            ],
            [
                'project_id' => '4',
                'project_name'    => 'POS',
                'client_id'    => '3',
                'project_start'    => '2022-05-01',
                'project_end'    => '2022-08-31',
                'project_status'    => 'DOING',
            ],

        ];
        // Using Query Builder
        $this->db->table('tb_m_project')->insertBatch($data);
    }
}
