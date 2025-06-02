<?php
// kw1 SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 GROUP BY ranking DESC;
// kw2 SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;
// kw3 UPDATE zawodnicy SET klasa = '5a' WHERE klasa = '4a';
// kw4 SELECT pseudonim, data_zdobycia, DATEDIFF(now(), data_zdobycia)  AS dni FROM zawodnicy WHERE tytul IS NOT NULL;
$connect = mysqli_connect(
    'localhost',
    'root',
    '',
    'szachy'
);

$query1 = mysqli_query($connect, 'SELECT pseudonim, tytul, ranking, klasa FROM zawodnicy WHERE ranking > 2787 GROUP BY ranking DESC;');
$losuj = mysqli_query($connect, 'SELECT pseudonim, klasa FROM zawodnicy ORDER BY RAND() LIMIT 2;');

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/szachy.css">
    <title>KOŁO SZACHOWE</title>
</head>

<body>
    <header>
        <h2>Koło szachowe <i>gambit piona</i></h2>
    </header>
    <aside>
        <h4>Polecane linki</h4>
        <ul>
            <li>kw1</li>
            <li>kw1</li>
            <li>kw1</li>
            <li>w dupie to mam</li>
        </ul>
        <img src="../inf03/szachy/board.png" alt="logo koła">
    </aside>
    <main>
        <h3>najlepsi gracze naszego koła</h3>
        <table>
            <tr>
                <th>Pozycja</th>
                <th>Pseudonim</th>
                <th>Tytuł</th>
                <th>Ranking</th>
                <th>Klasa</th>
            </tr>
            <?php
            $counter = 1;
            while ($row = mysqli_fetch_assoc($query1)) {
                echo "<tr>";
                echo "<td>" . $counter++ . "</td>";
                echo "<td>" . $row['pseudonim'] . "</td>";
                echo "<td>" . $row['tytul'] . "</td>";
                echo "<td>" . $row['ranking'] . "</td>";
                echo "<td>" . $row['klasa'] . "</td>";
            };
            ?>
            </table>
            <?php
              echo "<h3>Wylosowani zawodnicy:</h3>";
            while ($row = mysqli_fetch_assoc($losuj)) {
                echo $row['pseudonim'] . " — " . $row['klasa'];
            }
            mysqli_close($connect);
            ?>
            <form>
                <input type="submit" value="losuj ponownie">
            </form> 
        <p>Legenda: AM - Absolutny Mistrz, SM - Szkolny Mistrz, PM - Mistrz Poziomu, KM - Mistrz Klasowy</p>
    </main>
    <footer>
        <p>strone wykonal maks</p>
    </footer>
</body>

</html>