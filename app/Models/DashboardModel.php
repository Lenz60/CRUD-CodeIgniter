<?php

namespace App\Models;

use CodeIgniter\Model;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class DashboardModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';

    public function show($token)
    {
        $session = \Config\Services::session();
        $model = new DashboardModel();
        helper('jwt');
        try {
            $decoded_token = validateJWT($_COOKIE['COOKIE-SESSION']);
            $builder = $this->table('users');
            $data = $builder->where('email', $decoded_token->email)->first();
            if (!$data) {
                return false;
            } else {
                $data2 = [
                    'email' => $data['email'],
                    'name' => $data['name'],
                    'image' => $data['image'],
                    'date_created' => $data['date_created']
                ];
                return $data2;
            }
        } catch (Exception $e) {
            $session->setFlashdata('message', '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-300 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">Session Expired</span>, Please login again
              </div>');
            // echo $e->getMessage();
            return redirect()->to('/auth');
        }

        // $decoded_token = JWT::decode($_COOKIE['COOKIE-SESSION'], new Key($key, 'HS256'));
    }
}
