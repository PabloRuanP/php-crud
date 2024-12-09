<?php 
require_once '../Controllers/listController.php';
require_once 'Templates/pagination.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$numberOfItems = 5;

$tableView = new TableView($page, $numberOfItems);
$paginationView = new PaginationView($page, $numberOfItems);
?>

<?php include('Templates/navbar.php');?>

<div class="container mt-4">
    <?php 
            if (isset($_SESSION['response'])) {
                include_once('Templates/alert.php');
            } unset($_SESSION['response'])
        ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold"> Book List
                        <a href="addBook.php" class="btn btn-primary float-end " data-toggle="modal" data-target="">
                            <i class="fas fa-plus-circle"></i>
                            Adicionar</a>
                    </h4>
                </div>
                <div class="card-body overflow-auto">
                    <table class="table table-hover text-center">
                        <thead class="">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Author</th>
                                <th scope="col">N° Pages</th>
                                <th scope="col">Genre</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php $tableView->render(); ?>
                        </tbody>
                    </table>
                </div>
                <!-- Templates pagination -->
                <div class="card-footer">
                    <?php $paginationView->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Templates footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</body>

</html>