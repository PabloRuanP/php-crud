<?php 

require_once '../../Core/connection.php';

class Model extends Connection {


    public function __construct() {
        parent::__construct();
    }



    public function setList($title, $author, $pages, $genre) {
        $sql = "INSERT INTO tb_livros (title, author, pages, genre) VALUE (?, ?, ?, ?)";
        $query = $this->pdo->prepare($sql);
        $result = [
            $title,
            $author,
            $pages,
            $genre,
        ];
        if ($query->execute($result) == true) {
            return true;
        } else {
            return false;
        }
    
    }

    public function getList() {

        $sql = "SELECT * FROM tb_livros";
        $stmt = $this->pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;

    }

    public function deleteBook($id) {

        if ($id) {
            $sql = "DELETE FROM tb_livros WHERE id = :id";
            $query = $this->pdo->prepare($sql);
            $result = array(':id' => $id);

            if ($query->execute($result)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateList($id, $title, $author, $pages, $genre) {

        if ($id && $title && $author && $pages && $genre) {
            $sql = "UPDATE tb_livros SET title = :title, author = :author, pages = :pages, genre = :genre WHERE id = :id";
            $query = $this->pdo->prepare($sql);
            $result = array(
                ':id' => $id,
                ':title' => $title,
                ':author' => $author,
                ':pages' => $pages,
                ':genre' => $genre,
            );
            if ($query->execute($result)) {
                return true;
            } else {
                return false;
            }
            
        } else {
            return false;
        }
    }

    public function exists($title, $author):bool {
        $sql = "SELECT COUNT(*) as count FROM tb_livros WHERE title = ? AND author = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([
            $title,
            $author
        ]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

    public function searchBook($id) {
        try {
            $sql = "SELECT * FROM tb_livros WHERE id = :id";
            $query = $this->pdo->prepare($sql);
            $query->execute([':id' => $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error when searching for book:" . $e->getMessage());
            return [];
        }
    }

    
    public function getListPages($firstPage, $numberOfItems) {
        $sql = "SELECT * FROM tb_livros ORDER BY title LIMIT :firstPage, :numberOfItems";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':firstPage', $firstPage, PDO::PARAM_INT);
        $stmt->bindValue(':numberOfItems', $numberOfItems, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getTotalCount() {
        $sql = "SELECT COUNT(*) as total FROM tb_livros";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}

?>