<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'Model.php';

class  BookModel extends Model {

    private $title;
    private $author;
    private $pages;
    private $genre;

    public function setTitle($param) {
        $this->title = $param;
    }
    public function setAuthor($param) {
        $this->author = $param;
    }
    public function setPages($param) {
        $this->pages = $param;
    }
    public function setGenre($param) {
        $this->genre = $param;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPages() {
        return $this->pages;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function add() {
        return $this->setList(
            $this->getTitle(),
            $this->getAuthor(),
            $this->getPages(),
            $this->getGenre()
        );
    }
}
?>