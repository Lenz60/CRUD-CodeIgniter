<?php

namespace App\Models;

use CodeIgniter\Model;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class DashboardModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
}
