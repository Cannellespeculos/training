<?php
namespace Todo\Models;

use Todo\Models\Post;
/** Class PostManager **/
class PostManager {

    private $bdd;

    // get bdd
    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    // get all the posts and return them in an associative array 
    public function all() {
        $stmt = $this->bdd->query('SELECT * FROM post');

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // store the new post in the bdd
    public function store($name) {
        $stmt = $this->bdd->prepare('INSERT INTO post(id_post, name, date) VALUES (NULL ,?, ?)');
        $stmt->execute(array(
            $name,
            date("Y-m-d")
        ));

        // return the id of the new post
        return $this->bdd->lastInsertId();

    }
}