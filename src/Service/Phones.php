<?php  

namespace App\Service;

use App\Entity\PhoneNumbers;

class Phones
{
    public function getInstance(): ?PhoneNumbers
    {
        $instance = new PhoneNumbers;
        return $instance;
    }
}
