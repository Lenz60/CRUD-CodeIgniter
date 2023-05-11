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

    public function showDataWhere($data)
    {
        $projectName = $data['project_name'];
        $clientName = $data['client_id'];
        $projectStatus = $data['project_status'];
        $builder = $this->table('tb_m_project');
        $builder->select('Project.project_name, Client.client_name, Project.project_start, Project.project_end, Project.project_status');
        $builder->from('tb_m_project as Project');
        $builder->join('tb_m_client as Client', 'Client.client_id = Project.client_id');
        if ($projectName == "") {
            if ($clientName == 'all') {
                if ($projectStatus == 'all') {
                    //select all data
                } else {
                    //select where project status is something
                    $builder->where('Project.project_status', $projectStatus);
                }
            } else {
                if ($projectStatus == 'all') {
                    //select where client id = id
                    $builder->where('Client.client_name', $clientName);
                } else {
                    //select where client id = id and project status is something
                    $builder->where('Client.client_name', $clientName);
                    $builder->where('Project.project_status', $projectStatus);
                }
            }
        } else {
            if ($clientName == 'all') {
                if ($projectStatus == 'all') {
                    //select where project name is something
                    $builder->like('Project.project_name', $projectName);
                } else {
                    //select where project name is something and project status is something
                    $builder->like('Project.project_name', $projectName);
                    $builder->where('Project.project_status', $projectStatus);
                }
            } else {
                if ($projectStatus == 'all') {
                    //select where project name is something and client id = id
                    $builder->like('Project.project_name', $projectName);
                    $builder->where('Client.client_name', $clientName);
                } else {
                    //select where project name is something and client id = id and project status is something
                    $builder->like('Project.project_name', $projectName);
                    $builder->where('Client.client_name', $clientName);
                    $builder->where('Project.project_status', $projectStatus);
                }
            }
        }
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
