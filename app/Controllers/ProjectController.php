<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\UserModel;

class ProjectController extends BaseController
{

    public function index()
    {
        //
        $session = \Config\Services::session();
        if (!isset($_COOKIE['COOKIE-SESSION'])) {
            $data['title'] = 'Login';
            $session->setFlashdata('message', 'Session expired, Please login again');
            return view('login', $data);
        } else {
            $model = new ProjectModel();
            $model->getClient();
            $this->showData();
            // $this->show();
            return view('project');
        }
    }

    public function show()
    {
    }

    public function showData()
    {

        $session = \Config\Services::session();
        $token = $_COOKIE['COOKIE-SESSION'];
        $userModel = new UserModel();
        $projectModel = new ProjectModel();
        helper('jwt');
        try {
            $decoded_token = validateJWT($token);
            $user = $userModel->show($decoded_token->email);
        } catch (Exception $e) {
            $session->setFlashdata('message', '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-300 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Session Expired</span>, Please login again
            </div>');
            return redirect()->to('/auth');
        }
        if (!$user) {
            $data['title'] = 'Login';
            $session->setFlashdata('message', 'Session expired, Please login again');
            return view('login', $data);
        } else {
            $result = $projectModel->showData();
            $client = $projectModel->getClient();
            if (!$result && !$client) {
                echo 'Database empty';
            } else {
                $data = [
                    'title' => 'Project Data',
                    'project' => $result->getResult(),
                    'client' => $client->getResult(),
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'image' => $user['image'],
                    'date_created' => $user['date_created']
                ];
                // dd($data);
                return view('project', $data);
            }
        }
    }
}
