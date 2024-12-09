<?php 
require_once '../Models/bookModel.php';

class ListController {

    private $bookModel;

    public function __construct() {
        $this->bookModel = new BookModel();
    }


    public function getTableRows($page, $numberOfItems) {
        $firstPage = ($numberOfItems * $page) - $numberOfItems;
        $rows = $this->bookModel->getListPages($firstPage, $numberOfItems);

        $tableRows = '';
        foreach ($rows as $value) {
            $tableRows .= "<tr>";
            $tableRows .= "<th>".$value['id'] ."</th>";
            $tableRows .= "<td>".$value['title'] ."</td>";
            $tableRows .= "<td>".$value['author'] ."</td>";
            $tableRows .= "<td>".$value['pages'] ."</td>";
            $tableRows .= "<td>".$value['genre'] ."</td>";
            $tableRows .= "<td>
            <a class='btn btn-sm btn-success' href='readBook.php?id=".$value['id']."'><i class='far fa-eye'></i></a>

            <a class='btn btn-sm btn-warning' href='editBook.php?id=".$value['id']."'><i class='far fa-edit'></i></a>

            <a class='btn btn-sm btn-danger' href='../Controllers/deleteController.php?id=".$value['id']."'><i class='fas fa-trash'></i></a>
            </td>";
            $tableRows .= "</tr>";
        }

        return $tableRows;
    }


    public function getPagination($page, $numberOfItems) {
        $totalPages = $this->getTotalPages($numberOfItems);

        $pagination = '<nav aria-label="Page navigation example">';
        $pagination .= '<ul class="pagination justify-content-end">';

        $pagination .= '<li class="page-item '.($page <= 1 ? 'disabled' : '').'">';
        $pagination .= '<a class="page-link" href="?page='.($page - 1).'">Previous</a>';
        $pagination .= '</li>';

        for ($i = 1; $i <= $totalPages; $i++) {
            $pagination .= '<li class="page-item '.($page == $i ? 'active' : '').'">';
            $pagination .= '<a class="page-link" href="?page='.$i.'">'.$i.'</a>';
            $pagination .= '</li>';
        }

        $pagination .= '<li class="page-item '.($page >= $totalPages ? 'disabled' : '').'">';
        $pagination .= '<a class="page-link" href="?page='.($page + 1).'">Next</a>';
        $pagination .= '</li>';

        $pagination .= '</ul>';
        $pagination .= '</nav>';

        return $pagination;
    }


    public function getTotalPages($numberOfItems) {
        $totalItems = $this->bookModel->getTotalCount();
        return ceil($totalItems / $numberOfItems);
    }
}
?>