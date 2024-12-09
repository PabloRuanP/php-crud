<?php 
require_once '../Models/bookModel.php';

class DeleteController {

    private $delete;

    public function __construct($id) {
        $this->delete = new BookModel();
        
        if ($this->delete->deleteBook($id) == true) {
            $_SESSION['response'] = [
                'success' => true,
                'message' => "Record deleted successfully!"
            ];
        } else {
            $_SESSION['response'] = [
                'success' => false,
                'message' => "Error deleting record!"
            ];
        }
        header("Location: ../view/home.php");
        exit;
        
    }
}
new DeleteController($_GET['id']);

?>