<?php

namespace Todo\Controllers;

use Todo\Models\PostManager;
use Todo\Validator;

/** Class PostController **/
class PostController {
    private $manager;
    private $validator;

    // get the manager and validator in __construct()
    public function __construct() {
        $this->manager = new PostManager();
        $this->validator = new Validator();
    }

    // show view index
    public function index() {
        require VIEWS . 'Todo/index.php';
    }

    // show view create
    public function creation() {
        require VIEWS . 'Todo/create.php';
    }

    // get all posts and encode them into json
    public function getResponse() {
        // get all posts
        $posts = $this->manager->all();

        // turning posts into json
        header('Content-Type: application/json');
        echo json_encode($posts);
    }

    // create a new post in the bdd
    public function create() {
        // store new post
        $store = $this->manager->store($_POST["name"]);

        // encode values from the form into json
        header('Content-Type: application/json');
        echo json_encode([
            "id_post" => $store,
            "name" => $_POST["name"],
            "date" => date("Y-m-d"),
        ]);

    }

}