<?php

use Dom\Mysql;

    $polaczenie = mysqli_connect("localhost", "root", "", "gry");
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="./styl.css">
</head>
<body>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section id="lewa">
        <h3>Top 5 gier w tym miesiącu</h3>
        <ul>
            <?php 
                $kwerenda3 = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
                $wiersze = mysqli_query($polaczenie, $kwerenda3);
                foreach ($wiersze as $wiersz) {
                    $nazwa = $wiersz["nazwa"];
                    $punkty = $wiersz["punkty"];
                    echo "<li>$nazwa <span class='format_stylem'>$punkty</span></li>";
                }
            ?>
        </ul>

        <h3>Nasz sklep</h3>
        <a href="http://sklep.gry.pl">Tu kupisz gry</a>
        <h3>Stronę wykonał</h3>
        <p>00000000000</p>
    </section>
    <section id="srodkowa">
        <?php 
            $kwerenda1 = "SELECT id, nazwa, zdjecie FROM gry;";
            $wiersze = mysqli_query($polaczenie, $kwerenda1);
            foreach ($wiersze as $wiersz) {
                $id = $wiersz["id"];
                $nazwa = $wiersz["nazwa"];
                $zdjecie = $wiersz["zdjecie"];
                echo "<div><img src='$zdjecie' alt='$nazwa' title='$id'><p>$nazwa</p></div>";
            }
        ?>
    </section>
    <section id="prawa">
        <h3>Dodaj nową grę</h3>
        <form action="" method="post">
            <label for="nazwa">nazwa</label><br>
            <input type="text" id="nazwa" name="nazwa"><br>
            <label for="opis">opis</label><br>
            <input type="text" id="opis" name="opis"><br>
            <label for="cena">cena</label><br>
            <input type="text" id="cena" name="cena"><br>
            <label for="zdjecie">zdjecie</label><br>
            <input type="text" id="zdjecie" name="zdjecie"><br>
            <button type="submit" name="dodaj">DODAJ</button>
        </form>
    </section>
    <footer>
        <form action="" method="post">
            <label for="id">nazwa</label>
            <input type="text" id="id" name="id">
            <button type="submit">Pokaż opis</button>
        </form>
        <?php
            if (isset($_POST["dodaj"]) && !empty($_POST["nazwa"])) {
                $nazwa = $_POST["nazwa"];
                $opis = $_POST["opis"];
                $cena = $_POST["cena"];
                $zdjecie = $_POST["zdjecie"];
                $kwerenda4 = "INSERT INTO gry (nazwa, opis, punkty, cena, zdjecie) VALUES ('$nazwa', '$opis', 0, $cena, '$zdjecie');";
                $wiersze = mysqli_query($polaczenie, $kwerenda4);
            } 
            else if (!empty($_POST["id"])) {
                $id = $_POST["id"];
                $kwerenda2 = "SELECT nazwa, LEFT(opis, 100) AS opis, punkty, cena FROM gry WHERE id = $id";
                $wiersze = mysqli_query($polaczenie, $kwerenda2);
                foreach ($wiersze as $wiersz) {
                    $nazwa = $wiersz["nazwa"];
                    $opis = $wiersz["opis"];
                    $punkty = $wiersz["punkty"];
                    $cena = $wiersz["cena"];
                    echo "<h2>$nazwa, $punkty, punktów, $cena zł</h2><p>$opis</p>";
                }
            }
        ?>
        <h2></h2>
    </footer>
</body>
</html>
<?php 
    mysqli_close($polaczenie);
?>