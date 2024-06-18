<?php
namespace Todo\Models;

class Post {
    private $id_post;
    private $name;
    private $date;

    public function getId() {
        return $this->id_post;
    }

    public function getName() {
        return $this->name;
    }

    public function getDate() {
        return $this->date;
    }

    public function setId($id_post) {
        $this->id_post = $id_post;
    }

    public function setName($name) {
        $this->name = $name ;
    }

    public function setDate($date) {
        $this->date = $date;
    }
}

