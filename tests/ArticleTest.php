<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;

class ArticleTest extends LoadTest
{
    public function testCreateAuthorAndArticle()
    {
        $this->assertTrue(true);
        var_dump ('---avada kedavra---');

        $content = 'something else';

        $this->author->setFname('Jacke');
        $this->author->setLname('Diamonds');

        $this->article->setContent($content);
        $this->article->setAuthor($this->author);

        $this->doctrine->persist($this->author);
        $this->doctrine->persist($this->article);

        $this->doctrine->flush();
    }

    public function testCreateAuthorAndArticle0()
    {
        $this->assertTrue(true);
        var_dump ('---avada kedavra---');

        $content = 'second content';

        $this->author->setFname('Queen');
        $this->author->setLname('Hearts');

        $this->article->setContent($content);
        $this->article->setAuthor($this->author);

        $this->doctrine->persist($this->author);
        $this->doctrine->persist($this->article);

        $this->doctrine->flush();
    }

    public function testCreateAuthorAndArticle2()
    {
        $this->assertTrue(true);
        var_dump ('---avada kedavra---');

        $content = 'third content';

        $this->author->setFname('King');
        $this->author->setLname('Clubs');

        $this->article->setContent($content);
        $this->article->setAuthor($this->author);

        $this->doctrine->persist($this->author);
        $this->doctrine->persist($this->article);

        $this->doctrine->flush();
    }

    public function testCreateAuthorAndArticle4()
    {
        $this->assertTrue(true);
        var_dump ('---avada kedavra---');

        $content = 'four content';

        $this->author->setFname('Dolly');
        $this->author->setLname('Spades');

        $this->article->setContent($content);
        $this->article->setAuthor($this->author);

        $this->doctrine->persist($this->author);
        $this->doctrine->persist($this->article);

        $this->doctrine->flush();
    }
}
