<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel;
use App\Models\UserModel;

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
            $projectModel->getClient();
        }
    }

    public function show()
    {
    }
}
