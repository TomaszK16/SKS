<?php
    require '../init.php';

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $result = mysqli_query($connection, "DELETE FROM zawodnicy WHERE id = $id");
    }
?>