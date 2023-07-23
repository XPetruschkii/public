<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Dieser Vorgang führt dazu, dass Sie abgemeldet werden'); window.location.href = '/public/php/homepage/about.php';</script>";
exit;
?>
