<?php
    require '../init.php';

    if(isset($_GET['id'])) {
        $id = (int) $_GET['id'];
        $result = mysqli_query($connection, "SELECT * FROM zawodnicy WHERE id = $id");

        if ($row = mysqli_fetch_row($result)) {
            echo json_encode($row); 
        } else {
            echo json_encode(['error' => 'User not found']);
        }
    }
?>