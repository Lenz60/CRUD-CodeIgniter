<?php

namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $userModel = new UserModel();
        $data = [
            'name' => 'Rafly Andrian Wicaksana',
            'email'    => 'test@email.com',
            'password' => $userModel->encryptPass('test123'),
            'image' => '1683691477_add28c9a2636af4c5ed4.png',
            'is_active' => 1,
            'date_created' => '1683691477'

        ];
        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
