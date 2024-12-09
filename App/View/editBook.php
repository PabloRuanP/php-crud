<?php
require_once '../Controllers/editController.php';
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
                    <h4 class="fw-bold"> Edit Book
                        <a href="home.php" class="btn btn-danger float-end fw-semibold " data-toggle="modal"
                            data-target="">
                            <i class="fas fa-arrow-left"></i>
                            Close</a>
                    </h4>
                </div>
                <div class="card-body overflow-auto">
                    <form method="POST" action="../Controllers/editController.php">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_GET['id']);?>">
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Title</label>
                            <input type="text" class="form-control" name="title" aria-describedby="Title"
                                value="<?php echo htmlspecialchars($updateController->getTitle());?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Author</label>
                            <input type="text" class="form-control" name="author" aria-describedby="Author"
                                value="<?php echo htmlspecialchars($updateController->getAuthor());?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Pages</label>
                            <input type="number" class="form-control" name="pages" aria-describedby="Pages" min="1"
                                max="10000" value="<?php echo htmlspecialchars($updateController->getPages());?>"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label fw-semibold">Genre</label>
                            <input type="text" class="form-control" name="genre" aria-describedby="Genre"
                                value="<?php echo htmlspecialchars($updateController->getGenre());?>" required>
                        </div>
                        <button type="submit" class="btn btn-success fw-semibold" value="editBook"
                            id="editBook">Submit</button>
                    </form>
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