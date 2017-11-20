<?php
    $dbhost="localhost";
    $dbname="id3361961_demande_conge";
    $dbuser="id3361961_root";
    $dbpassword="rootbanana";
    try {
        $pdo=new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8","$dbuser","$dbpassword");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (Exception $exc) {
        die("Erreur lors de l'accès à la base de données.");
    }
    function sanitize ($var) {
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlspecialchars($var);
    return $var;
    }
    function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }
?>