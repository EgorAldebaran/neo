<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;
use App\Service\Users;
use App\Service\Phones;

class NeoTest extends KernelTestCase
{
    /**
    * @var User
    */
    protected $user;

    /**
    * @var Phone
    */
    protected $phone;

    /**
    * @var DoctrineManager
    */
    protected $doctrine;

    public function setUp(): void
    {
        static::bootKernel();
        $this->doctrine = static::$kernel->getContainer()->get('doctrine')->getManager();
        $this->user = static::$kernel->getContainer()->get(Users::class)->getInstance();
        $this->phone = static::$kernel->getContainer()->get(Phones::class)->getInstance();
    }

    public function testAvadaKedavra()
    {
        var_dump ('---avada kedavra---');
    }
    
    public function lltestAvadaKedavra()
    {
        var_dump ('---avada kedavra---');
        /// создадим 18 летнюю девушку
        $this->user->setName('Ema');
        $this->user->setGender(2);
        $this->user->setBirthDate('2004-10-10');

        $this->phone->setUser($this->user);
        $this->phone->setPhone('748848484');

        $this->doctrine->persist($this->user);
        $this->doctrine->persist($this->phone);
        $this->doctrine->flush();
    }
}
