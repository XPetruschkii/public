<!DOCTYPE html>
<html lang="de">
<head>
    <title>Dashboard</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/header.html' ?>
    <link rel="stylesheet" href="/public/css/auth.css">
    <link rel="stylesheet" href="/public/css/homepage.css">
    <script type="text/javascript" src="/public/js/navbar.js" defer></script>
    <!--Navbar schließt den header und öffnet den body-->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/navbar.html' ?>
    <?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location:/public/php/auth-sys/login.php");
        exit;
    }

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

// Nutzerdaten aus Datenbank abfragen
$user_id = $_SESSION['user_id'];
$sql = "SELECT Vorname, Nachname, Rolle, Vertrag FROM userdata WHERE Id='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $vorname = $row["Vorname"];
    $nachname = $row["Nachname"];
    $rolle = $row["Rolle"];
    $vertrag = $row["Vertrag"];
} else {
    $vorname = "Unbekannt";
}
$conn->close();
?>


<!--Hier kommt euer Code hinein-->


<br>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/footer.html' ?>
</body>
</html>