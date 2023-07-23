<!DOCTYPE html>
<html lang="de">
<head>
<title>Registrieren</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/header.html' ?>
<link rel="stylesheet" href="/public/css/auth.css">
<link rel="stylesheet" href="/public/css/homepage.css">
<script type="text/javascript" src="/public/js/navbar.js" defer></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/login-navbar.html' ?>
<body>
<h1>Registrieren</h1>
<?php 

// Verbindung mit der Datenbank herstellen
$servername = "sql306.epizy.com";
$username = "epiz_33583066";
$password = "shsgvss123456";
$dbname = "epiz_33583066_gvsshs";
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob Verbindung erfolgreich hergestellt wurde
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// Überprüfen, ob Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Passwort verschlüsseln
    $hash = password_hash($password, PASSWORD_BCRYPT);

    // Daten in Datenbank einfügen
    $sql = "INSERT INTO auth (Email, Password)
    VALUES ('$email', '$hash')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;
        session_start();
        $_SESSION['user_id'] = $user_id;
        header("Location:/public/php/auth-sys/nutzerdaten.php");
        exit;
    } else {
        echo "Fehler beim Hinzufügen des Benutzers: " . $conn->error;
    }

    $conn->close();
}


?> 


<!-- HTML-Formular zur Registrierung -->
<div class="login-window">
<h2 class="loginHeadline">Erstelle ein neues Profil</h2>
<div id="error"></div>
<form action="" method="post">
  <input type="text" id="email" name="email" oninput="checkInputs()" placeholder="📧 Email" required><br>
  <input type="password" id="password" name="password" oninput="checkInputs()" placeholder="🔒 Passwort Mindestens 6 Zeichen!"required><br><br>
  <button type="submit" id="submit">Registrieren</button> <br><br>
 Bereits ein Profil angelegt? <br>  <a class="register-a" href="/public/php/auth-sys/login.php">Login</a> 
</form>
</div> 
<script>
  function checkInputs() {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const submitButton = document.getElementById("submit");

    if (emailInput.value.includes("@") && passwordInput.value.length >= 6) 
    {submitButton.disabled = false;} 
    else {submitButton.disabled = true;}
      }
</script>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/footer.html' 
?> 
</body>
</html>