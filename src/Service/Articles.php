<?php  

namespace App\Service;

use App\Entity\Article;

class Articles
{
    public function getInstance(): ?Article
    {
        $instance = new Article;
        return $instance;
    }
}
