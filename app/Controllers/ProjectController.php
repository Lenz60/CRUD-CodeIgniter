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
            $user = $this->user();
            $table = $this->showTable();
            $data = [
                'title' => $user['title'],
                'name' => $user['name'],
                'image' => $user['image'],
                'project' => $table['project'],
                'client' => $table['client'],
            ];
            return view('project', $data);
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
        try {
            $user = $userModel->show($decoded_token->email);
        } catch (RedirectException $e) {
            $data['title'] = 'Login';
            $session->setFlashdata('message', 'Session expired, Please login again');
            return view('login', $data);
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
        $projectModel = new ProjectModel();
        $result = $projectModel->showData();
        if (!$result) {
            //Flashdata here
        } else {
            $client = $projectModel->getClient();
            $data = [
                'project' => $result->getResult(),
                'client' => $client->getResult(),
            ];
            return $data;
        }
    }
}






// if (!$result && !$client) {
//     echo 'Database empty';
// } else {
//     $data = [
//         'title' => 'Project Data',
//         'project' => $result->getResult(),
//         'client' => $client->getResult(),
//         'email' => $user['email'],
//         'name' => $user['name'],
//         'image' => $user['image'],
//         'date_created' => $user['date_created']
//     ];
//     // dd($data);
//     return view('project', $data);
// }
