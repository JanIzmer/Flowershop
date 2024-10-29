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
if(isset($_REQUEST['Yes'])){
    $stmt=$pdo->query('SET foreign_key_checks = 0');
    $stmt=$pdo->prepare ('DELETE FROM article WHERE id_article = ?');
    $stmt->execute([$_REQUEST['id']]);
    $stmt=$pdo->query('SET foreign_key_checks = 1');
    header("Location: article.php");
}
if(isset($_REQUEST['Deleteklient'])){
    $stmt=$pdo->query('SET foreign_key_checks = 0');
    $stmt=$pdo->prepare ('DELETE FROM user WHERE id_user = ?');
    $stmt->execute([$_REQUEST['id']]);
    $stmt=$pdo->query('SET foreign_key_checks = 1');
    header("Location: klient.php");
}
elseif(isset($_REQUEST['No'])){
    header("Location: article.php");
}
if(isset($_REQUEST['deleteid'])){
    $stmt=$pdo->query('SET foreign_key_checks = 0');
    $stmt=$pdo->prepare ('DELETE FROM orders WHERE id_order = ?');
    $stmt->execute([$_POST['deleteid']]);
    $stmt=$pdo->query('SET foreign_key_checks = 1');
    header("Location: zamowienie.php");
}
?>