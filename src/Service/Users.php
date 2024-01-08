<?php  

namespace App\Service;

use App\Entity\User;

class Users
{
    public function getInstance(): ?User
    {
        $instance = new User;
        return $instance;
    }
}
