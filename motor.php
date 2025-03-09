<?php
    $conn = new mysqli(hostname: "localhost",username: "root",password: "",database: "motory");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Motocykle</title>
</head>
<body>
    <img id="background" src="motor.png" alt="motocykl">

    <header id="baner">
        <h1>Motocykle - moja pasja</h1>
    </header>

    <div id="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
                $sql = "SELECT w.nazwa, w.opis, w.poczatek, z.zrodlo FROM wycieczki w JOIN zdjecia z WHERE w.zdjecia_id = z.id;";
                $result = $conn->query(query: $sql);
                while($row = $result -> fetch_array()) {
                    echo "<dt class=terminy>";
                        echo "$row[0], rozpoczyna się w $row[2], <a href='$row[3].jpg'>zobacz zdjęcie</a>";
                    echo "</dt>";
                    echo "<dd>";
                        echo $row[1];
                    echo "</dd>";
                }
            ?>
        </dl>
    </div>

    <div id="prawyg">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </div>

    <div id="prawyd">
        <h2>Statystyki</h2>
        <?php
            $sql = "SELECT COUNT(*) AS liczba_wycieczek FROM wycieczki;";
            $result = $conn -> query(query: $sql);
            while($row = $result -> fetch_array()) {
                echo "<p>Wpisanych wycieczek: $row[0]</p>";
            }

            $conn -> close();
        ?>
        <p>Użytkowników forum: 200”</p>
        <p>Przesłanych zdjęć: 1300”</p>
    </div>

    <footer id="stopka">Stronę wykonał: <a href="https://github.com/ferl19" target="_blank">ferl</a></footer>
</body>
</html>