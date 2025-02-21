<?php
    $res = mysqli_query($connection, 'SELECT * FROM zawodnicy;');

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
                <button>
                    <img src=\"assets/icons/edit.svg\" 
                        alt=\"Edytuj dane użytkownika\"
                        class=\"svg-filter\"
                    /> 
                </button>
            </td>
            <td>
                <button>
                    <img src=\"assets/icons/trash.svg\" 
                        alt=\"Usuń użytkownika\"
                        class=\"svg-filter\"
                    /> 
                </button>
            </td>
            
        </tr>
        ";
    }
?>