<?php 

require_once '../Models/bookModel.php';

class AddController {

    private $addBook;

    public function __construct() {
        $this->addBook = new BookModel();
        $this->add();
    }

    private function add() {

    $title = trim($_POST['title']);
    $author = trim($_POST['author']);
    $pages = trim($_POST['pages']);
    $genre = trim($_POST['genre']);

    if ($this->addBook->exists($title, $author)) {
        $_SESSION['response'] = [
            'success' => false,
            'message' => "The book is already registered!"
        ];
        header("Location: ../view/addBook.php");
        exit;
        
    }

    $this->addBook->setTitle($title);
    $this->addBook->setAuthor($author);
    $this->addBook->setPages($pages);
    $this->addBook->setGenre($genre);
    
    $result = $this->addBook->add();

    if ($result >= 1) {
        $_SESSION['response'] = [
            'success' => true,
            'message' => "Registration added successfully!"
        ];
    } else {
        $_SESSION['response'] = [
            'success' => false,
            'message' => "Error writing record!"
        ];
    }
    header("Location: ../view/addBook.php");
    exit;
        
    }
}
new AddController();
?>