<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Controllers\BaseController;
use App\Models\UserModel;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class DashboardController extends BaseController
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
            $user = $this->show();
            // dd($user);
            if ($user['title'] == 'Login') {
                $data = [
                    'title' => 'Login',
                    'message' => 'Session expired, Please login again'
                ];
                $session->setFlashdata('message', $data['message']);
                return view('login', $data);
            } else {
                $data = [
                    'title' => 'Dashboard',
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'image' => $user['image'],
                    'date_created' => $user['date_created']
                ];
                return view('dashboard', $data);
            }
        }
    }

    public function show()
    {
        $session = \Config\Services::session();
        $token = $_COOKIE['COOKIE-SESSION'];
        $model = new UserModel();
        $key = getenv('JWT_SECRET_KEY');
        $result = $model->show($token);
        // dd($result);
        if ($result) {
            $data = [
                'title' => 'Dashboard',
                'email' => $result['email'],
                'name' => $result['name'],
                'image' => $result['image'],
                'date_created' => $result['date_created']
            ];
            // $session->set('title', $data['title']);
            return $data;
        } else {
            $data = [
                'title' => 'Login',
            ];

            return $data;
        }
        // dd($result);
    }
}
