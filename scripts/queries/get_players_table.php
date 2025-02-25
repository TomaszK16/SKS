<?php
    $res = mysqli_query($connection, 'SELECT * FROM zawodnicy;');

    if(mysqli_num_rows($res) == 0) {
        echo 
        "
        <div class=\"no-players\">
            <h2> Pustki w bazie <a href='pwb.html'>...</a> </h2>
            <button class=\"panel-button\" id=\"create-user-button\">
                <img src=\"assets/icons/user-plus.svg\" 
                    alt=\"Dodaj nowego użytkownika\"
                    class=\"svg-filter\"
                /> 
                Stwórz pierwszego zawodnika!
            </button>
        </div>
        ";
    }
    else {
        echo "
        <div id=\"action-bar\">
            <button class=\"panel-button\" id=\"create-user-button\">
                <img src=\"assets/icons/user-plus.svg\" 
                    alt=\"Dodaj nowego zawodnika\"
                    class=\"svg-filter\"
                /> 
                Dodaj zawodnika
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
        ";

        while($row = mysqli_fetch_row($res)) {

            $initials = mb_substr($row[1], 0, 1) . mb_substr($row[2], 0, 1);
    
            echo 
            "
            <tr>
                <td>
                    <div class=\"avatar\">$initials</div>
                </td>
                <td>$row[1] $row[2]</td>
                <td>$row[3]</td>
                <td>$row[4]</td>
                <td>$row[5]cm</td>
                <td>
                    <button class=\"action-icon edit\" player-id=\"$row[0]\">
                        <img src=\"assets/icons/user-cog.svg\" 
                            alt=\"Edytuj dane użytkownika\"
                            class=\"svg-filter\"
                        /> 
                    </button>
                </td>
                <td>
                    <button class=\"action-icon delete\" player-id=\"$row[0]\">
                        <img src=\"assets/icons/trash.svg\" 
                            alt=\"Usuń użytkownika\"
                            class=\"svg-filter\"
                        /> 
                    </button>
                </td>
                
            </tr>
            ";
        }

        echo "</table>";
    }


    
?>