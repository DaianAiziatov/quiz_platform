<?php
    $dsn = 'mysql:host=/* host name */;dbname=/* db name */';
    $username = '/* usernmae */';
    $password = '/* password */';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>