<?php
$host = 'localhost';
$db   = 'flowershop';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try{
    $pdo =new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
if(isset($_POST['usun_z_koszyka'])){
    $idart=(int)$_POST['id_article'];
    $idorder=(int)$_POST['id_order'];
    $delete=$pdo->query("DELETE FROM article_in_order WHERE `article_in_order`.`id_article` =$idart AND `article_in_order`.`id_order`= $idorder");
    header("Location: koszyk.php");
}