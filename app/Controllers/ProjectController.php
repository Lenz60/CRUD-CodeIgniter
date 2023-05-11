<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\UserModel;
use CodeIgniter\Router\Exceptions\RedirectException;

class ProjectController extends BaseController
{

    public function index()
    {
        $session = \Config\Services::session();
        //check session
        //if no session exists return login
        if (!isset($_COOKIE['COOKIE-SESSION'])) {
            $data['title'] = 'Login';
            $session->setFlashdata('message', 'Session expired, Please login again');
            return view('login', $data);
        } else {
            $this->showTable();
            return view('project');
        }
    }

    public function user()
    {
        $session = \Config\Services::session();
        $token = $_COOKIE['COOKIE-SESSION'];
        $userModel = new UserModel();
        $projectModel = new ProjectModel();
        helper('jwt');
        //decode header token jwt
        $decoded_token = validateJWT($token);
        $user = $userModel->show($decoded_token->email);
        //check if user correct with token payload
        if (!$user) {
        } else {
            $data = [
                'title' => 'Project Data',
                'name' => $user['name'],
                'image' => $user['image'],
            ];
            return $data;
        }
    }

    public function showTable()
    {
        $user = $this->user();
        $projectModel = new ProjectModel();
        $projectName = $this->request->getVar('filterProjectName');
        $clientName = $this->request->getVar('filterClient');
        $projectStatus = $this->request->getVar('filterStatus');
        if ($clientName == null) {
            $result = $projectModel->showData();
            if (!$result) {
                //Flashdata here
            } else {
                $client = $projectModel->getClient();
                $data = [
                    'title' => $user['title'],
                    'name' => $user['name'],
                    'image' => $user['image'],
                    'project' => $result->getResult(),
                    'client' => $client->getResult(),
                ];
            }
        } else {
            $data = [
                'project_name' => $projectName,
                'client_id' => $clientName,
                'project_status' => $projectStatus,
            ];
            $result = $projectModel->showDataWhere($data);
            $client = $projectModel->getClient();
            $data = [
                'title' => $user['title'],
                'name' => $user['name'],
                'image' => $user['image'],
                'project' => $result->getResult(),
                'client' => $client->getResult(),
                'filterProjectNamePH' => $projectName,
                'filterClientPH' => $clientName,
                'filterStatusPH' => $projectStatus,
            ];
        }
        return view('project', $data);
    }

    public function filter()
    {
        $session = \Config\Services::session();
        $projectModel = new ProjectModel();
        $projectName = $this->request->getVar('filterProjectName');
        $clientId = $this->request->getVar('filterClient');
        $projectStatus = $this->request->getVar('filterStatus');

        $data = [
            'project_name' => $projectName,
            'client_id' => $clientId,
            'project_status' => $projectStatus,
        ];
        $result = $projectModel->showDataWhere($data);
        $client = $projectModel->getClient();
        $data = [
            'project' => $result->getResult(),
            'client' => $client->getResult(),
        ];

        // dd($data['project']);
        // return $data;
        return view('project');
    }
}
