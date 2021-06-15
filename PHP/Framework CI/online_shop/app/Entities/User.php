<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    public function setPassword(string $password)
    {
        $salt = uniqid('', true);
        $this->attributes['salt'] = $salt;
        $this->attributes['password'] = md5($salt . $password);

        return $this;
    }
}
