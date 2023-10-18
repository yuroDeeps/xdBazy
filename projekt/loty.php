<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loty</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" id="center">
        <input type="date" name="date" id="date" value="2022-05-31">
        <input type="submit" value="Wyślij">
    </form>

    <?php
        if(isset($_POST["date"])){
            $db = mysqli_connect("localhost", "root", "", "lotnisko");

            $q = "SELECT * FROM flights WHERE departure_date = '".$_POST["date"]."'";

            $r = mysqli_query($db, $q);

            echo "<table>";
            echo "<tr>
                <th>Wylot</th>
                <th>Przylot</th>
                <th>Łącznie miejsca</th>
            </tr>";
            while($row = mysqli_fetch_assoc($r)){
                echo "<tr>";
                echo "<td>".$row["departure_date"] . " ". $row['departure_time']. " ". $row['departure_location']. " Bramka: ". $row['gate_number']."</td>";
                echo "<td>".$row["arrival_date"] . " ". $row['arrival_time']. " ". $row['arrival_location']."</td>";
                echo "<td>".$row["seats"]."</td>";
                echo "</tr>";
            }
        }
    ?>
</body>
</html>