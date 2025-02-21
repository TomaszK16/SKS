<?php
    $res = mysqli_query($connection, 'SELECT * FROM zawodnicy;');

    if(mysqli_num_rows($res) == 0) {
        echo 
        "
        <div class=\"no-players\">
            <h2> Pustki w bazie (PWB) </h2>
            <span>
                Bitek angażuje się w swój klub sportowy!<br>
                Ale nie jest w tym zbyt dobry, okazuje się że sport \"Bitomiarka\" opiera się na całkowitej dominacji genetycznej osób wysokich (takiej że dla każdej pary graczy i oraz j (1 ≤ i, j ≤ n ∧ i ≠ j), gdzie n to liczba wszystkich graczy (2 ≤ n ≤ 10⁹), wygra ten który jest wyższy (zawodnik i wygra z j <=> wᵢ > wⱼ). Bitek ma wysokość W i zastanawia się ile innych zawodników jest w stanie z pewnością pokonać na przestrzeni d dni (1 ≤ d ≤ 10⁶). Codziennie zestawienie zawodników się zmienia, co znaczy że każdy zawodnik j, może danego dnia:<br>
                <ul>
                    <li>Opuścić zawody (co znaczy że od tego dnia włącznie nie bierze udziału w rozgrywkach)
                    <li>Powrócić do zawodów (co znaczy że od tego dnia włącznie ponownie bierze udział w rozgrywkach)
                    <li>Aktualizować swój wzrost o wartość k (-5 ≤ k ≤ 5), przez co wzrost tego zawodnika od tego momentu będzie wynosi wⱼ + k
                </ul>
                Jednak okazuje się, że przeciwnicy Bitka odkryli opisany powyżej plan wykorzystywania uczniów szkoł średnich do rozwiązywania problemów życiowych rodziny Bajtazara i usunęli wszystkie dane z bazy zawodników pozostawiając jedynie nieuporządkowane wzrosty początkowe.<br>
                Bitek wie, że pierwszego dnia wszyscy zawodnicy biorą udział. Zauważył także, że co każde zawody zawodnicy są tak dobierani, że wartości zbióru wzrostów w, gdzie wⱼ jest wzrostem j-tego zawodnika, tworzą ciąg bi-arytmetyczny. Ciąg bi-arytmetyczny jest ciągiem, w którym istnieje że istnieje s (1 ≤ s ≤ n ∧ s ∈ N), dla którego podciągi (a₁, a₂, a₃, ... aₛ) oraz (aₛ, aₛ₊₁, aₛ₊₂ ... aₙ) są arytmetyczne.<br>
                Pomóż Bitkowi określić ile zawodników z pewnością pokona każdego dnia oraz jaki będzie jego wynik końcowy.
            </span>
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