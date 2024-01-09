<?php

/**
 * gets all users for idx
 * 
 * @param string $idx - Через запятую значения id ожидается в $_GET переменной
 * @return User[] 
 * 
 */
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
        $conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users where id=:user_id");
        $stmt->bindParam(':user_id', $idx);
        $stmt->execute();

        $data = [];

        while($obj = $stmt->fetchObject()){
            foreach ($idx as $id) {
                $data[$id] = $obj->name;                
            }
		}
    } catch(PDOException $e) {
        echo "PDO Error: " . $e->getMessage();
    }
    $conn = null;
}

