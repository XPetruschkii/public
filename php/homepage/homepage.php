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


<h1>Willkommen <?php echo $vorname; echo " "; echo $nachname; echo "!"; ?></h1>

<?php 
if ($rolle == 0) {
    echo '<div class="login-window"> 
    <h4>Tutorendashboard</h4>';
    if ($vertrag == "" || $vertrag == 0) {
        echo '<h2>Du hast deinen Tutorenvertrag noch nicht unterschrieben⚠️</h2>';
        echo '<div class="dash"> Hilfreiche Dokumente findest du hier👇</div>';
         echo '<div class="dash"> <a href="http://shs.rf.gd/public/pdf/ShS_Vertrag_Tutor.pdf" target="_blank"><br>📁Der Tutorenvertrag</a> </div> <br>
         Fülle den Tutorenvertrag aus, und gebe diesen bei den 
         <a href="/public/php/homepage/ansprechpartner.php">Ansprachpartnern</a> 
         ab, um mit dem Unterrichten zu beginnen! ';
        echo '<div class="dash"><a href="/public/pdf/ShS_Rahmenvereinbarung_Tutoren.pdf" target="_blank"><br>📁Die Tutoren Rahmenvereinbarung</a> </div><br>
        hier erhälst du einen Überblick über das Allgemeine Vorgehen<br><br>';
        echo '<br><div class="dash"><a href="/public/pdf/ShS_Checkliste_Erstkontakt.pdf" target="_blank">📁Die Checkliste für den Erstkontakt</a> </div><br>
        Bringe diese beim erstkontakt mit deinem Schüler mit!';
        
    }
    else {
        echo '<p>Tutorenvertrag bereits abgeschlossen🫱🏻‍🫲🏼</p>';
        echo '<div class="dash"><a href="/public/pdf/ShS_Checkliste_Erstkontakt.pdf" target="_blank"><br>📁Die Checkliste für den Erstkontakt</a> </div><br>
        Bringe diese beim erstkontakt mit deinem Schüler mit!';   
    }
   
}

elseif ($rolle == 1) {
    echo '<div class="login-window"> 
    <h4>Schülerdashboard</h4>';
    if ($vertrag == "" || $vertrag == 0) {
        echo '<h2>Du hast deinen Schülervertrag noch nicht unterschrieben⚠️</h2>';
        echo '<div class="dash"> Hilfreiche Dokumente findest du hier👇</div>';
         echo '<div class="dash"> <a href="/public/pdf/ShS_Vertrag_für_Schüler.pdf" target="_blank"><br>📁Der Schülervertrag</a> </div> <br>
         Fülle den Schülervertrag aus, und gebe diesen bei den 
         <a href="/public/php/homepage/ansprechpartner.php"> 
         Ansprachpartnern
         </a> 
         ab, um Unterricht in Anspruch nehmen zu können! ';
        echo '<div class="dash"><a href="/public/pdf/ShS_Rahmenvereinbarung_Schüler.pdf" target="_blank"><br>📁Die Schüler Rahmenvereinbarung</a> </div><br>
        hier erhälst du einen Überblick über das Allgemeine Vorgehen';
       

    

    } else {
        echo '<p>Tutorenvertrag bereits abgeschlossen🫱🏻‍🫲🏼</p>';
    }
    echo '</div>';
}

elseif ($rolle == 2) {
  echo '<div class="login-window"> 
    <h4>Tutorendashboard</h4>';
    if ($vertrag == "" || $vertrag == 0) {
        echo '<h2>Du hast deinen Tutorenvertrag noch nicht unterschrieben⚠️</h2>';
        echo '<div class="dash"> Hilfreiche Dokumente findest du hier👇</div>';
         echo '<div class="dash"> <a href="http://shs.rf.gd/public/pdf/ShS_Vertrag_Tutor.pdf" target="_blank"><br>📁Der Tutorenvertrag</a> </div><br>
         Fülle den Tutorenvertrag aus, und gebe diesen bei den 
         <a href="/public/php/homepage/ansprechpartner.php">Ansprachpartnern</a> 
         ab, um mit dem Unterrichten zu beginnen! ';
        echo '<div class="dash"><a href="/public/pdf/ShS_Rahmenvereinbarung_Tutoren.pdf" target="_blank"><br>📁Die Tutoren Rahmenvereinbarung</a> </div><br>
        hier erhälst du einen Überblick über das Allgemeine Vorgehen<br><br>';
        echo '<div class="dash"><a href="/public/pdf/ShS_Checkliste_Erstkontakt.pdf" target="_blank">📁Die Checkliste für den Erstkontakt</a> </div><br>
        Bringe diese beim erstkontakt mit deinem Schüler mit!<br>';
        echo '</div>';
        } 
            else {
        echo '<p>Tutorenvertrag bereits abgeschlossen🫱🏻‍🫲🏼</p>';
        echo '<div class="dash"><a href="/public/pdf/ShS_Checkliste_Erstkontakt.pdf" target="_blank"><br>📁Die Checkliste für den Erstkontakt</a> </div><br>
        Bringe diese beim erstkontakt mit deinem Schüler mit!';   
        echo '</div>';
        
    }
       
         
    echo '<br> <br> <div class="login-window"> 
    <h4>Schülerdashboard</h4>';
    if ($vertrag == "" || $vertrag == 0) {
        echo '<h2>Du hast deinen Schülervertrag noch nicht unterschrieben⚠️</h2>';
        echo '<div class="dash"> Hilfreiche Dokumente findest du hier👇</div>';
         echo '<div class="dash"> <a href="/public/pdf/ShS_Vertrag_für_Schüler.pdf" target="_blank"><br>📁Der Schülervertrag</a> </div> <br>
         Fülle den Schülervertrag aus, und gebe diesen bei den 
         <a href="/public/php/homepage/ansprechpartner.php"> 
         Ansprachpartnern
         </a> 
         ab, um Unterricht in Anspruch nehmen zu können! ';
        echo '<div class="dash"><a href="/public/pdf/ShS_Rahmenvereinbarung_Schüler.pdf" target="_blank"><br>📁Die Schüler Rahmenvereinbarung</a> </div><br>
        hier erhälst du einen Überblick über das Allgemeine Vorgehen'; 
        echo '</div><br><br><br><br><br>';
    } 
     else {
        echo '<p>Schülervertrag bereits abgeschlossen🫱🏻‍🫲🏼</p>';
         echo '</div>';}

  
echo '</div>';}
?>
<br>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/footer.html' ?>
</body>
</html>