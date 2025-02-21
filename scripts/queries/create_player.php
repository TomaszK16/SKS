<?php
    require '../init.php';
    require 'form.php';

    $player = get_form_data(["name", "surname", "grade", "birth_year", "height"]);

    $player["grade"] = (int) $player["grade"];
    $player["birth_year"] = (int) $player["birth_year"];
    $player["height"] = (int) $player["height"];

    $stmt = mysqli_prepare($connection, "
        INSERT INTO zawodnicy (imie, nazwisko, klasa, rok_urodzenia, wzrost) 
        VALUES (?, ?, ?, ?, ?)
    ");

    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($stmt, "ssiii", 
        $player["name"], 
        $player["surname"], 
        $player["grade"], 
        $player["birth_year"], 
        $player["height"]
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../../users.php");  
        exit();
    } else {
        echo "Error: " . mysqli_stmt_error($stmt);
    }
?>