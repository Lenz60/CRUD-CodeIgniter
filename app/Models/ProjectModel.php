<?php

namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_m_project';
    protected $primaryKey       = 'project_id';


    public function showData()
    {
        $builder = $this->table('tb_m_project');
        $builder->select('Project.project_name, Client.client_name, Project.project_start, Project.project_end, Project.project_status');
        $builder->from('tb_m_project as Project');
        $builder->join('tb_m_client as Client', 'Client.client_id = Project.client_id');
        $builder->groupBy('Project.project_id');
        $data = $builder->get();
        return $data;
    }

    public function getClient()
    {
        $builder = $this->table('tb_m_client');
        $builder->select('Client.client_id,client_name');
        $builder->from('tb_m_client as Client');
        $builder->groupBy('client_name');
        $data = $builder->get();
        // dd($data->getResult());
        return $data;
    }
}
