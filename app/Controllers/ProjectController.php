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
            $this->show();
            return view('project');
        }
    }

    public function show()
    {
        $session = \Config\Services::session();
        $token = $_COOKIE['COOKIE-SESSION'];
        $model = new UserModel();
        $result = $model->show($token);
        $data = [
            'title' => 'Dashboard',
            'email' => $result['email'],
            'name' => $result['name'],
            'image' => $result['image'],
            'date_created' => $result['date_created']
        ];
        $session->set('title', $data['title']);
        return view('dashboard', $data);
    }
}
