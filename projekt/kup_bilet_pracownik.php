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
            echo "<br><br>";

            $q = "SELECT * FROM flights";
            $r = mysqli_query($db, $q);
            while($row = mysqli_fetch_assoc($r)){
                echo "<input type='radio' name='flight' value='".$row['id']."'>".$row["departure_date"] . " ". $row['departure_time']. " ". $row['departure_location']. " Bramka: ". $row['gate_number'] . " ". $row["arrival_date"] . " ". $row['arrival_time']. " ". $row['arrival_location']."<br>";
            }
        ?>
        Cena: <input type="number" step=".01" name="price" id="price">
        Klasa: <input type="number" name="class" id="class">
        Czy zapłacono: <input type="checkbox" name="is_paid" id="is_paid">
        <input type="submit" value="Kup bilet">
    </form>


    <?php
        if(isset($_POST["passenger"])){
            $passanger = $_POST["passenger"];
            $flight = $_POST["flight"];
            $price = $_POST["price"];
            $class = $_POST["class"];
            if(isset($_POST["is_paid"])) {
                $is_paid = 1;
            } else {
                $is_paid = 0;
            };
            
            $q = "INSERT INTO tickets VALUES (NULL, $passanger, $flight, $price, $class, $is_paid)";

            $r = mysqli_query($db, $q);
        }
    ?>
    </div>
</body>
</html>