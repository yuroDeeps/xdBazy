<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasażer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="center">
    <h1>Zobacz bilety</h1>
    <form method="post">
        <?php
            $db = mysqli_connect("localhost", "root", "", "lotnisko");

            $q = "SELECT * FROM passengers";

            $r = mysqli_query($db, $q);
            
            while($row = mysqli_fetch_assoc($r)){
                echo "<input type='radio' name='passenger' value='".$row['id']."'>".$row['first_name']." ".$row['last_name']. " (" .$row['country']. ") [". $row["email"] ."]<br>";
            }
        ?>
        <input type="submit" value="Zobacz bilety">
    </form>


    <?php
        if(isset($_POST["passenger"])){
            $q = "SELECT * FROM tickets, flights WHERE tickets.flight_id = flights.id AND passanger_id = ".$_POST["passenger"];
            $r = mysqli_query($db, $q);

            echo "<table>";
            echo "<tr>
                <th>Cena</th>
                <th>Klasa</th>
                <th>Zapłacone</th>
                <th>Wylot</th>
                <th>Przylot</th>
                <th>Łącznie miejsca</th>
            </tr>";
            while($row = mysqli_fetch_assoc($r)){
                echo "<tr>";
                echo "<td>".$row["price"]."</td>";
                echo "<td>".$row["class"]."</td>";

                if($row["is_paid"] == 1){
                    $row["is_paid"] = "Tak";
                }else{
                    $row["is_paid"] = "Nie";
                }
                echo "<td>".$row["is_paid"]."</td>";


                echo "<td>".$row["departure_date"] . " ". $row['departure_time']. " ". $row['departure_location']. " Bramka: ". $row['gate_number']."</td>";
                echo "<td>".$row["arrival_date"] . " ". $row['arrival_time']. " ". $row['arrival_location']."</td>";
                echo "<td>".$row["seats"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
    </div>
</body>
</html>