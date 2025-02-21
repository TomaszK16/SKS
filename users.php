<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./styles/style.css" rel="stylesheet">
    <title>Users</title>
    <script src="scripts/events.js" defer></script>
</head>

<?php require 'scripts/init.php';?>

<body>
    <dialog id="create-user-modal">
        <form method="POST" action="scripts/queries/create_player.php">
            <h2>Nowy użytkownik</h2>
            <input name="name"      type="text"     placeholder="Imię"          required minlength="1" maxlength="50">
            <input name="surname"   type="text"     placeholder="Nazwisko"      required minlength="1" maxlength="50">
            <input name="grade"     type="number"   placeholder="Klasa"         required min="1"     max="12">
            <input name="birth_year" type="number"  placeholder="Rok urodzenia" required min="1900"  max="<?php echo date(format: "Y");?>">
            <input name="height"    type="number"   placeholder="Wzrost"        required min="100"   max="250">
            <div class="buttons">
                <button class="cancel">Anuluj</button>
                <button type="submit">Zatwierdź</button>
            </div>
        </form>
    </dialog>

    <dialog id="edit-user-modal">
        <form method="POST" action="scripts/queries/edit_player.php">
            <input hidden name="id" required>
            <h2>Edytuj użytkownika</h2>
            <input name="name"      type="text"     placeholder="Imię"          required minlength="1" maxlength="50">
            <input name="surname"   type="text"     placeholder="Nazwisko"      required minlength="1" maxlength="50">
            <input name="grade"     type="number"   placeholder="Klasa"         required min="1"     max="12">
            <input name="birth_year" type="number"  placeholder="Rok urodzenia" required min="1900"  max="<?php echo date(format: "Y");?>">
            <input name="height"    type="number"   placeholder="Wzrost"        required min="100"   max="250">
            <div class="buttons">
                <button class="cancel">Anuluj</button>
                <button type="submit">Zatwierdź</button>
            </div>
        </form>
    </dialog>
    
    <header><h1>Baza zawodników SKS</h1></header>
        
    <main>
        <?php require 'scripts/queries/get_players_table.php';?>
    </main>
</body>


</html>