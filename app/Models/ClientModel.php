<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_m_client';
    protected $primaryKey       = 'client_id';

    public function getClient()
    {
        $builder = $this->table('tb_m_client');
        $builder->select('Client.client_id,Client.client_name');
        $builder->from('tb_m_client as Client');
        $builder->groupBy('client_name');
        $data = $builder->get();
        // dd($data->getResult());
        return $data;
    }
}
