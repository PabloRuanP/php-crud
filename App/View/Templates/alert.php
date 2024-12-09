<?php 
if (isset($_SESSION['response'])) {
   
    if (in_array(false, $_SESSION['response'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show fw-semibold" role="alert">' .
        $_SESSION['response']['message'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else {
        echo '<div class="alert alert-success alert-dismissible fade show fw-semibold" role="alert">' .
        $_SESSION['response']['message'] .
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}

unset($_SESSION['response']);

?>
