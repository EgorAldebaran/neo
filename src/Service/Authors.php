<?php  

namespace App\Service;

use App\Entity\Author;

class Authors
{
    public function getInstance(): ?Author
    {
        $instance = new Author;
        return $instance;
    }
}
