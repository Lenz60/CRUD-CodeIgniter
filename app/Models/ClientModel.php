<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_m_client';
    protected $primaryKey       = 'client_id';
}
