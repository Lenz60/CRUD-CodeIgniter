<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\ClientModel;
use App\Models\UserModel;
use CodeIgniter\Router\Exceptions\RedirectException;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use CodeIgniter\Format\JSONFormatter;
use PHPUnit\Util\Json;

class ProjectController extends BaseController
{

    public function index()
    {
        helper('form');
        $session = \Config\Services::session();
        //check session
        //if no session exists return login
        if (!isset($_COOKIE['COOKIE-SESSION'])) {
            $data['title'] = 'Login';
            $session->setFlashdata('message', 'Session expired, Please login again');
            return view('login', $data);
        } else {
            unset($_SESSION['message']);
            $table = $this->showTable();
            // dd($table);
            if ($table['title'] == 'Login') {
                $data = [
                    'title' => 'Login',
                    'message' => 'Session expired, Please login again'
                ];
                $session->setFlashdata('message', $data['message']);
                return view('login', $data);
            } else {
                $data = [
                    'title' => $table['title'],
                    'name' => $table['name'],
                    'image' => $table['image'],
                    'project' => $table['project'],
                    'client' => $table['client'],
                    'filterProjectNamePH' => "",
                    'filterClientPH' => "",
                    'filterStatusPH' => "",
                ];

                return view('project', $data);
            }
        }
    }

    public function user()
    {
        $session = \Config\Services::session();
        $token = $_COOKIE['COOKIE-SESSION'];
        $userModel = new UserModel();
        $key = getenv('JWT_SECRET_KEY');
        $user = $userModel->show($token);
        // helper('jwt');
        //decode header token jwt
        if ($user) {
            $data = [
                'title' => 'Project Data',
                'name' => $user['name'],
                'image' => $user['image'],
            ];
            return $data;
        } else {
            return false;
        }
    }

    public function showTable()
    {
        $session = \Config\Services::session();
        $user = $this->user();
        // dd($user);
        if ($user) {
            $projectModel = new ProjectModel();
            $clientModel = new ClientModel();
            $projectName = $this->request->getVar('filterProjectName');
            $clientName = $this->request->getVar('filterClient');
            $projectStatus = $this->request->getVar('filterStatus');
            if ($clientName == null) {
                $result = $projectModel->showData();
                if (!$result) {
                    //Flashdata here
                } else {
                    $client = $clientModel->getClient();
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
                $client = $clientModel->getClient();
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
                // dd($data);
            }
            return $data;
        } else {
            $data = [
                'title' => 'Login'
            ];
            return $data;
        }
    }

    public function filter()
    {
        $session = \Config\Services::session();
        $projectModel = new ProjectModel();
        $clientModel = new ClientModel();
        $projectName = $this->request->getVar('filterProjectName');
        $clientId = $this->request->getVar('filterClient');
        $projectStatus = $this->request->getVar('filterStatus');

        $table = $this->showTable();
        $user = $this->user();


        $data = [
            'project_name' => $projectName,
            'client_id' => $clientId,
            'project_status' => $projectStatus,
        ];
        $result = $projectModel->showDataWhere($data);
        $client = $clientModel->getClient();
        $data = [
            'filter' => true,
            'title' => $table['title'],
            'name' => $table['name'],
            'image' => $table['image'],
            'client' => $table['client'],
            'project' => $result->getResult(),
            'client' => $client->getResult(),
            'filterProjectNamePH' => $projectName,
            'filterClientPH' => $clientId,
            'filterStatusPH' => $projectStatus,
        ];

        // dd($data['project']);
        // return $data;
        // echo "Why blank";
        // dd($data);
        $session->set('Placeholder', true);
        return view('project', $data);
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
            $table = $this->showTable();
            $data = [
                'title' => $table['title'],
                'name' => $table['name'],
                'image' => $table['image'],
                'project' => $table['project'],
                'client' => $table['client'],
            ];
            $session->setFlashdata('message', 'Project successfully created');
            return view('project', $data);
        }
    }
    public function delete()
    {
        $session = \Config\Services::session();
        $projectModel = new ProjectModel();
        $selectedId = $this->request->getPost('selectId');
        $dataCount = count($selectedId);
        // dd($dataCount);
        $result = $projectModel->deleteProject($selectedId, $dataCount);
        $table = $this->showTable();
        $data = [
            'title' => $table['title'],
            'name' => $table['name'],
            'image' => $table['image'],
            'project' => $table['project'],
            'client' => $table['client'],
        ];
        // dd($result);
        if ($result) {
            $session->setFlashdata('message', 'Project successfully deleted');
            return json_encode(['status' => 'success']);
        } else {
            $session->setFlashdata('message', 'Failed to Delete Project');
            return json_encode(['status' => 'failed']);
        }
        // dd($data);

    }
}
