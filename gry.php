<?php
$polaczenie = mysqli_connect("localhost", "root", "", "gry");

function topGry($conn) {
    $q = "SELECT nazwa, punkty FROM gry ORDER BY punkty DESC LIMIT 5;";
    $wynik = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_assoc($wynik)) {
        echo "<li>{$row['nazwa']} <span class='format_stylem'>{$row['punkty']}</span></li>";
    }
}

function pokazGry($conn) {
    $q = "SELECT nazwa, zdjecie, id FROM gry;";
    $wynik = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_assoc($wynik)) {
        echo "<div><img src='{$row['zdjecie']}' alt='{$row['nazwa']}' title='{$row['id']}'><p>{$row['nazwa']}</p></div>";
    }
}

function dodajGre($conn) {
    if (isset($_POST["dodaj"]) && !empty($_POST["nazwa"])) {
        $nazwa = $_POST["nazwa"];
        $opis = $_POST["opis"];
        $cena = $_POST["cena"];
        $zdjecie = $_POST["zdjecie"];
        $q = "INSERT INTO gry (nazwa, opis, punkty, cena, zdjecie) VALUES ('$nazwa', '$opis', 0, $cena, '$zdjecie')";
        mysqli_query($conn, $q);
    }
}

function pokazOpis($conn) {
    if (!empty($_POST["id"])) {
        $id = $_POST["id"];
        $q = "SELECT nazwa, LEFT(opis,100) AS opis, punkty, cena FROM gry WHERE id = $id";
        $wynik = mysqli_query($conn, $q);
        while ($row = mysqli_fetch_assoc($wynik)) {
            echo "<h2>{$row['nazwa']}, {$row['punkty']} punktów, {$row['cena']} zł</h2><p>{$row['opis']}</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css" />
</head>
<body>
<header>
    <h1>Ranking gier komputerowych</h1>
</header>
<section id="lewa">
    <h3>Top 5 gier w tym miesiącu</h3>
    <ul><?php topGry($polaczenie); ?></ul>
    <h3>Nasz sklep</h3>
    <a href="http://sklep.gry.pl">Tu kupisz gry</a>
    <h3>Stronę wykonał</h3>
    <p>00000000000</p>
</section>

<section id="srodkowa">
    <?php pokazGry($polaczenie); ?>
</section>

<section id="prawa">
    <h3>Dodaj nową grę</h3>
    <form method="post">
        <label>nazwa</label><br>
        <input type="text" name="nazwa"><br>
        <label>opis</label><br>
        <input type="text" name="opis"><br>
        <label>cena</label><br>
        <input type="text" name="cena"><br>
        <label>zdjęcie</label><br>
        <input type="text" name="zdjecie"><br>
        <button type="submit" name="dodaj">DODAJ</button>
    </form>
</section>

<footer>
    <form method="post">
        <label for="id">nazwa</label>
        <input type="text" id="id" name="id">
        <button type="submit">Pokaż opis</butto
