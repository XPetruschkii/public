<!DOCTYPE html>
<html lang="de">
<head>
    <title>Profil</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/header.html' ?>
    <link rel="stylesheet" href="/public/css/auth.css">
    <script type="text/javascript" src="/public/js/navbar.js" defer></script>
    <!--Navbar schließt den header und öffnet den body-->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/navbar.html' ?>
    <?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location:/public/php/auth-sys/login.php");
        exit;
    }

// Datenbankverbindung
$servername = "sql306.epizy.com";
$username = "epiz_33583066";
$password = "shsgvss123456";
$dbname = "epiz_33583066_gvsshs";
// Verbindung erstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// SQL-Abfrage 
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM userdata WHERE id = '$user_id'";

// Ausführen
$result = $conn->query($sql);

// Tabelle erstellen
if ($result->num_rows > 0) {
    // Tabellenkopf erstellen
    echo "<h1>Profil</h1>";
    echo "<table>";
    echo "<thead><tr><th colspan='2'>Ihre Nutzerdaten:</th></tr></thead>";
    echo "<tbody>";
    // Name ausgeben
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>Vorname:</td><td>" . $row["Vorname"] . "</td></tr>";
        echo "<tr><td>Nachname:</td><td>" . $row["Nachname"] . "</td></tr>";
        echo "<tr><td>Rolle:</td><td>" . $row["Rolle"] . "</td></tr>";
        echo "<tr><td>Fach1:</td><td>" . $row["Fach1"] . "</td></tr>";
        echo "<tr><td>Fach2:</td><td>" . $row["Fach2"] . "</td></tr>";
        echo "<tr><td>Schulart:</td><td>" . $row["Schulart"] . "</td></tr>";
        echo "<tr><td>Steckbrief:</td><td>" . $row["Steckbrief"] . "</td></tr>";
    }
    // Tabelle schließen
    echo "</tbody></table>";
} else {
    echo "<h1>Keine Nutzerdaten vorhanden!</h1>";
}

$conn->close();
?>