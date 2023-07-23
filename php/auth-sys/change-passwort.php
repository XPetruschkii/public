<!DOCTYPE html>
<html lang="de">
<head>
<title>Passwort Reset</title>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/header.html' ?>
<link rel="stylesheet" href="/public/css/auth.css">
<script type="text/javascript" src="/public/js/navbar.js" defer></script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/login-navbar.html' ?>
    <h1>GVSS SHS</h1>

    <!--Login Page-->
    <div class="login-window">
        <form action="/public/php/auth-sys/login.php" method="post">
            <h2>Passwort zurücksetzen</h2>
            <input type="email" id="email" placeholder="📧 Email" required> <br> <br>
            <p style="line-height: 1.2; margin-top: 0;">Geben Sie ihre E-Mail an,<br> um einen link zum zurücksetzen des Passworts zugesendet zu bekommen!</p>

            <button type="submit">Fortsetzen</button>
            <div class="link-margin-top">
                <a class="register-a" href="/public/php/auth-sys/login.php">Erneut anmelden</a>
            </div>
        </form>
    </div>
    
    <!--Cookies and Legalese-->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/public/html/template/footer.html' ?>
</body>
</html>
