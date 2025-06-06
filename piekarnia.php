<?php
$baza = mysqli_connect('localhost', 'root', '', 'piekarnia');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/piekarnia.css">
    <title>PIEKARNIA</title>
</head>
<body>
    <img src="../inf03/piekarnia/wypieki.png">
    <nav>
        <a href="../inf03/piekarnia/kw1.png">kwerenda 1</a>
        <a href="../inf03/piekarnia/kw2.png">kwerenda 2</a>
        <a href="../inf03/piekarnia/kw3.png">kwerenda 3</a>
        <a href="../inf03/piekarnia/kw4.png">kwerenda 4</a>
    </nav>

    <header>
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne...</p>
    </header>

    <main>
        <h4>Wybierz rodzaj wypieków:</h4>
        <form action="piekarnia.php" method="POST">
            <select name="wybor">
                <?php
                $pytaj = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC";
                $wynik = mysqli_query($baza, $pytaj);

                while ($wiersz = mysqli_fetch_assoc($wynik)) {
                    echo "<option value='" . $wiersz['Rodzaj'] . "'>" . $wiersz['Rodzaj'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Wybierz">
        </form>

        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>

            <?php
            if (isset($_POST['wybor'])) {
                $form = mysqli_real_escape_string($baza, $_POST['wybor']);
                $pytaj2 = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$form'";
                $wynik2 = mysqli_query($baza, $pytaj2);

                while ($wiersz = mysqli_fetch_assoc($wynik2)) {
                    echo "<tr>";
                    echo "<td>" . $wiersz['Rodzaj'] . "</td>";
                    echo "<td>" . $wiersz['Nazwa'] . "</td>";
                    echo "<td>" . $wiersz['Gramatura'] . "</td>";
                    echo "<td>" . $wiersz['Cena'] . "</td>";
                    echo "</tr>";
                }
            }

            mysqli_close($baza);
            ?>
        </table>
    </main>

    <footer>
        <p>AUTOR: maks</p>
        <p>DATA: dzisiaj</p>
    </footer>
</body>
</html>
