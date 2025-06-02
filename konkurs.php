<?php
// kw1 SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;
// kw2 SELECT * FROM nagrody WHERE cena BETWEEN 100 AND 1000 AND ilosc_sztuk = 2;
// kw3 DELETE FROM nagrody WHERE cena IS NULL OR cena = 0;
// kw4 

$conn = mysqli_connect('localhost', 'root', '', 'egzamin1');
$query2 = 'SELECT nazwa, opis, cena FROM nagrody ORDER BY RAND() LIMIT 5;';
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <link rel="stylesheet" href="css/konkurs.css">
    <title>WOLONTARIAT SZKOLNY</title>
</head>

<body>
    <header>
        <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
        <h1> ważne że php działa </h1>
    </header>
    <form>
        <input type="submit" value="Wygeneruj nowe nagrody">
    </form>
    <section>
        <h3>Konkursowe nagrody
            <table>
                <tr>
                    <th>Nr</th>
                    <th>Nazwa</th>
                    <th>Opis</th>
                    <th>Wartość</th>
                </tr>
                <?php
                $counter = 1;
                $result = mysqli_query($conn, $query2);
                while ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>' . $counter++ . '</td>';
                    echo '<td>' . $row['nazwa'] . '</td>';
                    echo '<td>' . $row['opis'] . '</td>';
                    echo '<td>' . $row['cena'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </h3>
    </section>
    <aside></aside>
    <footer></footer>
</body>

</html>