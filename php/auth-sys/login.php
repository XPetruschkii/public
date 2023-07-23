<!DOCTYPE html>
<head>
<title>Login</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/header.html' ?>
<link rel="stylesheet" href="/public/css/auth.css">
<script type="text/javascript" src="/public/js/navbar.js" defer></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/login-navbar.html' ?>

<?php 
session_start();

// Überprüfen, ob Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Verbindung mit der Datenbank herstellen
    $servername = "sql306.epizy.com";
    $username = "epiz_33583066";
    $password_db = "shsgvss123456";
    $dbname = "epiz_33583066_gvsshs";
    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Überprüfen, ob Verbindung erfolgreich hergestellt wurde
    if ($conn->connect_error) {
        die("Verbindung fehlgeschlagen: " . $conn->connect_error);
    }

    // Überprüfen, ob Benutzer in Datenbank vorhanden ist
    $sql = "SELECT * FROM auth WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hash = $row['Password'];

        // Passwort überprüfen
        if (password_verify($password, $hash)) {
            $_SESSION['user_id'] = $row['Id'];
            header("Location:/public/php/homepage/homepage.php");
            exit;
        } else {
            echo "Benutzername oder Passwort ungültig";
        }
    } else {
        echo "Benutzername oder Passwort ungültig";
    }

    $conn->close();
}
?>


    <h1>GVSS SHS 🤝</h1>
    <div class="login-window">
   <h2 class="loginHeadline">Login</h2>
   <div id="error"></div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form">

        <input type="text" name="email" placeholder="📧 Email" id="email" required>

      
        <input type="password" name="password" placeholder="🔒 Password" id="password" required><br><br>
        <button name="submit" type="submit">Login</button> <br><br>
        </form>
        <div class="text">
        Neu hier?<br>
            <a class="register-a" href="/public/php/auth-sys/registration.php">Registrieren</a><br>
             <a class="register-a" href="/public/php/auth-sys/change-passwort.php">Passwort vergessen?</a> 
        </div>
    </div>



    <?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/footer.html' ?>
</body>
</html>