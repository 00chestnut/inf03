<?php
// kw1 SELECT id, nazwa, zdjecie FROM gry;
// kw2 SELECT nazwa, LEFT(opis, 100) AS opis, punkty, cena FROM gry WHERE id = '1';
// kw3 SELECT nazwa, punkty FROM gry GROUP BY punkty DESC LIMIT 5;
// kw4 INSERT INTO gry (nazwa, opis, punkty, cena, zdjecie)
// VALUES (
//   'Zamczysko',
//   'Na odludziu stoi opuszczone zamczysko, w którym znajduje się skarb strzeżony przez złowrogie demony i duchy',
//   200,
//   50,
//   'zamczysko.jpg'
// );
$db = mysqli_connect('localhost', 'root', '', 'gry');
$q1 = "SELECT nazwa, punkty FROM gry GROUP BY punkty DESC LIMIT 5;";
$q2 = "SELECT id, nazwa, zdjecie FROM gry;";
$query2 = mysqli_query($db, $q2);
$query3 = mysqli_query($db, $q1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <?php
        while ($image = mysqli_fetch_assoc($query2)) {
            echo "<img src=". $image['zdjecie'] .">" . "<p>". $image['nazwa'] ."</p>";

        };
        ?>
    </main>
    <ul>
        <?php
        while ($line = mysqli_fetch_assoc($query3)) {
            echo "<li>" . $line['nazwa'] . " " . $line['punkty'] . "</li>";
        };
        ?>
    </ul>
</body>

</html>
<style>
    main {
        background-color: black;
        height: 600px;
        overflow: scroll;
        width: 60%;
        color:white;
    }
</style>