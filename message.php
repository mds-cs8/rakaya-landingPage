<?php



if(isset($_SESSION['updateMessage']))
{
    ?>
        <div>
            <strong>مرحبًا </strong><?= $_SESSION['updateMessage'] ?>
            <button type ="button"  class="btn-class" data-bs-dismiss="alert"  aria-label="Close"></button>
        </div>
  <?php
}

?>