<?php
    require '../init.php';

    $player = get_form_data(["id", "name", "surname", "grade", "birth_year", "height"]);

    $player["id"] = (int) $player["id"];
    $player["grade"] = (int) $player["grade"];
    $player["birth_year"] = (int) $player["birth_year"];
    $player["height"] = (int) $player["height"];

    $stmt = mysqli_prepare($connection, "UPDATE zawodnicy SET imie = ?, nazwisko = ?, klasa = ?, rok_urodzenia = ?, wzrost = ? WHERE id = ?");

    mysqli_stmt_bind_param($stmt, "ssiiii", 
        $player["name"], 
        $player["surname"], 
        $player["grade"], 
        $player["birth_year"], 
        $player["height"],
        $player["id"],
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../users.php");  
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
?>