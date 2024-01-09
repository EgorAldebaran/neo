<?php  

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Contract\HttpClient\HttpClientInterface;
use App\Entity\Author;
use App\Entity\User;
use App\Entity\Article;

class ArticleInfo extends LoadTest
{
    public function lltestGetUsers()
    {
        $this->assertTrue(true);
        var_dump ('---avada kedavra---');

        $system = 'jacke, diamonds';

        $info = explode(',', $system);

        //$info = $this->load_users_data($system);

        $id_string = ',delete * from user,1';

        $repo = $this->doctrine->getRepository(User::class)->getUsers($id_string);
        var_dump ($repo);
    }
    
    /**
    * Advantage get Author for Article
    * @return Author
    */
    public function xtestGetAthorArticle()
    {
        $this->assertTrue(true);
        var_dump ('---avada kedavra---');

        $author = $this->doctrine->getRepository(Author::class)->findOneBy(['id' => 1]);
        var_dump ($author->getArticles()[0]->getContent());
    }

    //// возможность сменить автора статьи
    public function changeAuthor()
    {
        /// article
        $article = $this->doctrine->getRepository(Article::class)->findOneBy(['id' => 2]);
        var_dump ($article->getContent());

        /// set new author
        $article->setAuthor($this->author);

        $this->doctrine->persist($this->author);
        $this->doctrine->persist($article);

        $this->doctrine->flush();
    }

    public function testUserPDO()
    {
        $result = $this->getUserPDO('1,2,3');
        var_dump ($result);
    }
    
    function getUserPDO(string $idx)
    {
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "informer";

        if (!isset($idx)) {
            throw new \Exception('variable idx must be set');
        }

        $idx = explode(',', $idx);

        try {
            $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM user where id=:user_id");
            foreach ($idx as $id) {
                $stmt->bindParam(':user_id', $id, \PDO::PARAM_INT);                
            }

            $stmt->execute();

            $data = [];

            while($obj = $stmt->fetchObject()){
                foreach ($idx as $id) {
                    $data[$id] = $obj->name;                
                }
            }
        } catch(\PDOException $e) {
            echo "PDO Error: " . $e->getMessage();
        }
        $conn = null;
    }
    
}
