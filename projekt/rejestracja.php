<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" id="center">
        <input type="text" name="first_name" id="first_name" required placeholder="Imię"><br>
        <br>
        <input type="text" name="last_name" id="last_name" required placeholder="Nazwisko"><br>
        <br>
        <input type="text" name="gender" id="gender" required placeholder="Płeć"><br>
        <br>
        <input type="text" name="country" id="country" placeholder="Kraj" required><br>
        <br>
        <input type="text" name="passport_number" id="passport_number" placeholder="Numer Paszpot" required><br>
        <br>
        <input type="email" name="email" id="email" placeholder="Email" required><br>
        <br>
        <input type="submit" value="Zarejestruj">
    </form>

    <?php
        if(isset($_POST['passport_number'])) {
            $db = mysqli_connect("localhost", "root", "", "lotnisko");

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $passport_number = $_POST['passport_number'];
            $email = $_POST['email'];
            
            $q = "INSERT INTO passengers VALUES (NULL, '$first_name', '$last_name', '$gender', '$country', '$passport_number', '$email')";

            mysqli_query($db, $q);
        }
    ?>
</body>
</html>