<!DOCTYPE html>
<html lang="de">
<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/header.html' ?>
<link rel="stylesheet" href="/public/css/auth.css">
<link rel="stylesheet" href="/public/css/homepage.css">
<script type="text/javascript" src="/public/js/navbar.js" defer></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/navbar.html' ?>
<h1> Eingabe der Nutzerdaten </h1>
<?php 
session_start();

// Überprüfen, ob Session vorhanden ist
if (!isset($_SESSION['user_id'])) {
    header("Location:/public/php/auth-sys/registration.php");
    exit;
}
$servername = "sql306.epizy.com";
$username = "epiz_33583066";
$password = "shsgvss123456";
$dbname = "epiz_33583066_gvsshs";
$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen, ob Verbindung erfolgreich hergestellt wurde
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Überprüfen, ob Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $rolle = $_POST["rolle"];
    $steckbrief = $_POST["steckbrief"];
    $fach1 = $_POST["fach1"];
    $fach2 = $_POST["fach2"];
    $schulart = $_POST["schulart"];

    // Daten in Datenbank einfügen
    $sql = "INSERT INTO userdata (Id, Vorname, Nachname, Rolle, Steckbrief, Fach1, Fach2, Schulart)
    VALUES ('$user_id','$vorname', '$nachname', '$rolle', '$steckbrief', '$fach1', '$fach2', '$schulart')";

    if ($conn->query($sql) === TRUE) {
        header("Location:/public/php/homepage/homepage.php");
        exit;
    } else {
        echo "Fehler beim Hinzufügen des Benutzers: " . $conn->error;
    }

    $conn->close();
}

?> 
<!-- HTML-Formular zur Registrierung -->
<div class="login-window">
<h2 class="loginHeadline">Erzähle uns mehr über dich!</h2>
<form action="" method="post">
<input type="text" name="vorname" placeholder="Vorname" required><br><br>
<input type="text" name="nachname" placeholder="Nachname" required><br><br>
<textarea name="steckbrief" placeholder="📍Steckbrief" rows="4" style="resize: none; overflow: auto;" maxlength="128"></textarea><br><br><br>
<!-- <input type="text" name="steckbrief" placeholder="Steckbrief" rows="2" required><br><br> -->
  Schulart:<br>
  <select name="schulart">
    <option value="BKWI1">BKWI1</option>
    <option value="BKWI2">BKWI2</option>
    <option value="WG1">WG1</option>
    <option value="WG2">WG2</option>
    <option value="WG3">WG3</option>
    <option value="BFW1">BFW1</option>
    <option value="BFW2">BFW2</option>
  </select><br><br>
  Rolle:<br>
  <select name="rolle"required>
    <option value="0">Tutor👨‍🏫👩‍🏫</option>
    <option value="1">Schüler👨‍🎓👩‍🎓 </option>
    <option value="2">Beides👩‍🎓👩‍🏫</option>
  </select><br><br>
  Fach 1:<br>
  <select name="fach1"required>
    <option value="Mathe">Mathe 🧮</option>
    <option value="Deutsch">Deutsch 📖</option>
    <option value="Englisch">Englisch 💬</option>
  </select><br><br>
  Fach 2:<br>
  <select name="fach2">
    <option value="Mathe">Mathe 🧮</option>
    <option value="Deutsch">Deutsch 📖</option>
    <option value="Englisch">Englisch 💬</option>
    <option value="none">Kein weiteres Fach ⛔</option>
  </select><br><br>


<button type="submit">Angaben speichern</button> 
</form>
</div>
<br>
<br>
<br>
    <!--Footer-->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/footer.html' ?>
</body>
</html>