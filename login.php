<?php
include 'konekcija.php';

$status = false;
$submited = false;

if(isset($_POST['korisnicko_ime'])){
    $username = $_POST['korisnicko_ime'];
    $email = $_POST['email'];
    $password = $_POST['lozinka'];

    $submited = true;

    $query = "INSERT INTO korisnik (korisnicko_ime, email, lozinka) VALUES (:korisnicko_ime, :email, :lozinka)";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['korisnicko_ime' => $username, 'email' => $email, 'lozinka' => $password]);

    $status = true;
}

?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PHP simple register form</title>
    </head>


    <body>
        <form action="login.php" method="POST">
            <label for="korisnicko_ime">Korisničko ime:</label><br>
            <input type="text" id="korisnicko_ime" name="korisnicko_ime"><br><br>

            <label for="email">E-mail:</label><br>
            <input type="email" id="email" name="email"><br><br>

            <label for="lozinka">Lozinka:</label><br>
            <input type="password" id="lozinka" name="lozinka"><br><br>

            <button type="submit">Pošalji</button>
        </form>

        <?php

            if($status && $submited){
                echo "<p style='color: green;'>Prijava je uspješna!</p>";
            }else if($submited){
                echo "<p style='color: red;'>Prijava je neuspješna!</p>";
            }

        ?>        
    </body>


</html>