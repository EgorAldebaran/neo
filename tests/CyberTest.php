<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;
use App\Service\Users;
use App\Service\Phones;
use Carbon\Carbon;

class CyberTest extends KernelTestCase
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

    public function testCreate0()
    {
        var_dump ('---avada kedavra---');
        $birth_date = Carbon::create(2001, 10, 9);

        $this->user->setName('Dolly Dolores');
        $this->user->setGender(2);
        $this->user->setBirthDate($birth_date);

        $this->phone->setUser($this->user);
        $this->phone->setPhone('8777788473');

        $this->doctrine->persist($this->user);
        $this->doctrine->persist($this->phone);

        $this->doctrine->flush();
    }

    public function testCreate1()
    {
        $this->user->setName('Look  Informer');
        $this->user->setGender(1);
        $this->user->setBirthDate(Carbon::create(2005, 10, 4));

        $this->phone->setUser($this->user);
        $this->phone->setPhone('8777788873');

        $this->doctrine->persist($this->user);
        $this->doctrine->persist($this->phone);

        $this->doctrine->flush();
    }

    public function testCreate2()
    {
        $this->user->setName('Jacke Diamonds');
        $this->user->setGender(1);
        $this->user->setBirthDate(Carbon::create(1999, 10, 10));

        $this->phone->setUser($this->user);
        $this->phone->setPhone('8777788873');

        $this->doctrine->persist($this->user);
        $this->doctrine->persist($this->phone);

        $this->doctrine->flush();
    }

    public function testCreate3()
    {
        $this->user->setName('Queen Hearts');
        $this->user->setGender(2);
        $this->user->setBirthDate(Carbon::create(2006, 4, 5));

        $this->phone->setUser($this->user);
        $this->phone->setPhone('8777788873');

        $this->doctrine->persist($this->user);
        $this->doctrine->persist($this->phone);

        $this->doctrine->flush();
    }

    public function testCreate5()
    {
        $this->user->setName('Dick Dickson');
        $this->user->setGender(1);
        $this->user->setBirthDate(Carbon::create(2012, 1, 1));

        $this->phone->setUser($this->user);
        $this->phone->setPhone('8777788873');

        $this->doctrine->persist($this->user);
        $this->doctrine->persist($this->phone);

        $this->doctrine->flush();
    }
}
