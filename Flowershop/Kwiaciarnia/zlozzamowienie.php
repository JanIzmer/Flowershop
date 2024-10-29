<?php
if (isset($_REQUEST['zlozzamowienie'])){
    try{
        $host = 'localhost';
        $db   = 'flowershop';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $pdo =new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $cookie=$_COOKIE['id'];
    $req = $pdo->query("UPDATE `orders` SET `condition` = 'W realizacji' WHERE `orders`.`id_order` = 10");
}