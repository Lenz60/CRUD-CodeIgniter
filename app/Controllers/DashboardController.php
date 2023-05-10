<?php

namespace App\Controllers;

use App\Models\DashboardModel;
use App\Controllers\BaseController;
use App\Models\UserModel;

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
            $this->show();
            return view('dashboard');
        }
    }

    public function show()
    {
        $session = \Config\Services::session();
        $token = $_COOKIE['COOKIE-SESSION'];
        $model = new UserModel();
        helper('jwt');
        try {
            $decoded_token = validateJWT($token);
            $result = $model->show($decoded_token->email);
        } catch (Exception $e) {
            $session->setFlashdata('message', '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-300 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Session Expired</span>, Please login again
            </div>');
            return redirect()->to('/auth');
        }
        if (!$result) {
            $data['title'] = 'Login';
            $session->setFlashdata('message', 'Session expired, Please login again');
            return view('login', $data);
        } else {
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
}
