<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'salt', 'avatar', 'created_by', 'created_date', 'updated_by', 'updated_date'];

    protected $returnType = 'App\Entities\User';
    protected $useTimestamps = false;
}
