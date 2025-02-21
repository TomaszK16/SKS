<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./styles/style.css" rel="stylesheet">
    <title>Users</title>
</head>

<?php require 'scripts/init.php';?>

<body>
    <main>
        <div id="action-bar">
            <button>
                <img src="assets/icons/user-plus.svg" 
                    alt="Dodaj nowego użytkownika"
                    class="svg-filter"
                /> 
            </button>
            <button>
                <img src="assets/icons/file-import.svg" 
                    alt="Zaimportuj użytkowników"
                    class="svg-filter"
                /> 
            </button>
        </div>
        <table>
            <tr>
                <th></th>
                <th>IMIĘ I NAZWISKO</th>
                <th>KLASA</th>
                <th>ROK URODZENIA</th>
                <th>WZROST</th>
            </tr>
            <?php require 'scripts/get_rows.php';?>
            
        </table>
    </main>

</body>
</html>