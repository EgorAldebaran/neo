<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;
use App\Service\Users;
use App\Service\Phones;
use Carbon\Carbon;
use App\Entity\User;
use App\Entity\PhoneNumbers;

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
        $this->assertTrue(true);
        var_dump ('---avada kedavra---');
        $info = Carbon::create(2001, 10, 9, 14, 10, 15);
        //var_dump ($info->toDateTimeString());

        $qm = $this->doctrine->createQueryBuilder();
        $qm
            ->select('u.name, count(p.phone) as phone_count')
            ->from(User::class, 'u')
            ->innerJoin(PhoneNumbers::class, 'p', 'WITH', 'u.id=p.user')
            ->where(
                $qm->expr()->between('u.birth_date', ':minAge', ':maxAge')
            )
            ->setParameter('minAge', 8)
            ->setParameter('maxAge', 42)
            ->groupBy('u.name');

        $info = $qm->getQuery();
        var_dump ($info);
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
