<?php 
require_once '../Models/bookModel.php';

class EditController {
    
    private $editBook;
    private $title;
    private $author;
    private $pages;
    private $genre;
    
    
    public function __construct($id) {

        $this->editBook = new BookModel();
        $this->createForm($id);
        
    }

    public function createForm($id) {
        $row = $this->editBook->searchBook($id);
        if ($row) {
            $this->title = $row['title'];
            $this->author = $row['author'];
            $this->pages = $row['pages'];
            $this->genre = $row['genre'];
        } else {
            $_SESSION['response'] = [
                'success' => false,
                'message' => "ID not found!"
            ];
            header("Location: ../view/home.php");
            exit;
        }
        
    }
    
    public function editForm($id, $title, $author, $pages, $genre) {
        if ($this->editBook->updateList($id, $title, $author, $pages, $genre) == true) {
            $_SESSION['response'] = [
                'success' => true,
                'message' => "Update completed successfully!"
            ];
            header("Location: ../view/home.php");
            exit;
        } else {
            $_SESSION['response'] = [
                'success' => false,
                'message' => "Error updating record!"
            ];
            header("Location: ../view/editar.php?id=" . $id);
            exit;
        }
    }

    public function getTitle(){
        return $this->title;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getPages(){
        return $this->pages;
    }
    public function getGenre(){
        return $this->genre;
    }
    
}

try {
    //$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    } else {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    }
    

    if (!$id || !is_numeric($id)) {
        $_SESSION['response'] = [
            'success' => false,
            'message' => "Invalid ID!"
        ];
        header("Location: ../view/home.php");
        exit;
    }

    $updateController = new EditController($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $success = $updateController->editForm(
            $id,
            $_POST['title'],
            $_POST['author'],
            $_POST['pages'],
            $_POST['genre']
        );
    }
    

} catch (Exception $e) {
    error_log($e->getMessage());
    die("Erro: " . $e->getMessage());
}

?>
