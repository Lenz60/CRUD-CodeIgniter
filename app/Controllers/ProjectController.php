<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\UserModel;
use CodeIgniter\Router\Exceptions\RedirectException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

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
            unset($_SESSION['message']);
            $this->showTable();
            return view('project');
        }
    }

    public function user()
    {
        $session = \Config\Services::session();
        $token = $_COOKIE['COOKIE-SESSION'];
        $userModel = new UserModel();
        $key = getenv('JWT_SECRET_KEY');
        // helper('jwt');
        //decode header token jwt
        try {
            $decoded_token = JWT::decode($token, new Key($key, 'HS256'));
            $user = $userModel->show($decoded_token->email);
        } catch (ExpiredException $e) {
            setcookie('COOKIE-SESSION', null);
            $session->setFlashdata('message', '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-300 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Token Invalid</span>, Please login again
        </div>');
            // echo $e->getMessage();
            return redirect()->to('/auth');
        }
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
        $session = \Config\Services::session();
        $user = $this->user();
        if (!$user) {
            $session->setFlashdata('message', '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-300 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Token Invalid</span>, Please login again
        </div>');
            // echo $e->getMessage();
            return redirect()->to('/auth');
        } else {
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
    public function create()
    {
        $session = \Config\Services::session();
        $projectModel = new ProjectModel();
        $projectName = $this->request->getVar('newProjectName');
        $clientId = $this->request->getVar('newProjectClient');
        $projectStart = $this->request->getVar('newProjectStart');
        $projectEnd = $this->request->getVar('newProjectEnd');
        $projectStatus = $this->request->getVar('newProjectStatus');
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'newProjectName' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter project name'
                ]
            ],
            'newProjectStart' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter project start date'
                ]
            ],
            'newProjectEnd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please enter project end date'
                ]
            ]
        ]);

        if (!$validate) {
            $data = [
                'project_name' => $projectName,
                'client_id' => $clientId,
                'project_start' => $projectStart,
                'project_end' => $projectEnd,
                'project_status' => $projectStatus,
                'validation' => $this->validator
            ];
            $valmessage = [
                'newProjectName' => $validation->getError('newProjectName'),
                'newProjectStart' => $validation->getError('newProjectStart'),
                'newProjectEnd' => $validation->getError('newProjectEnd')
            ];
            $session->setFlashdata('message', $valmessage);
            $this->showTable();
            return view('project', $data);
        } else {
            $data = [
                'project_name' => $projectName,
                'client_id' => $clientId,
                'project_start' => $projectStart,
                'project_end' => $projectEnd,
                'project_status' => $projectStatus,
            ];
            $projectModel->create($data);
            $this->showTable();
            $session->setFlashdata('message', 'Project successfully created');
            return view('project');
        }
    }
}
