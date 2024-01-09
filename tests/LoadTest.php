<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;
use App\Service\Users;
use App\Service\Phones;
use App\Service\Authors;
use App\Service\Articles;
use Carbon\Carbon;

class LoadTest extends KernelTestCase
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

    /**
    * @var Author
    */
    protected $author;

    /**
    * @var Article
    */
    protected $article;

    public function setUp(): void
    {
        static::bootKernel();
        $this->doctrine = static::$kernel->getContainer()->get('doctrine')->getManager();
        $this->user = static::$kernel->getContainer()->get(Users::class)->getInstance();
        $this->phone = static::$kernel->getContainer()->get(Phones::class)->getInstance();
        $this->author = static::$kernel->getContainer()->get(Authors::class)->getInstance();
        $this->article = static::$kernel->getContainer()->get(Articles::class)->getInstance();
    }

}
