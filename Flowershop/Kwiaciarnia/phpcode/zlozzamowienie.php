<?php
if (isset($_REQUEST['zlozzamowienie'])){
    try{
        require 'base.php';
        $pdo =new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    $price=$_POST['priceorder'];
    $cookie=$_COOKIE['id'];
    $req = $pdo->query("UPDATE `orders` SET `price` = $price WHERE `orders`.`id_user` = $cookie and `orders`.`condition` ='Oczekujace'");
    $req = $pdo->query("UPDATE `orders` SET `condition` = 'W realizacji' WHERE `orders`.`id_user` = $cookie and `orders`.`condition` ='Oczekujace'");
    header('Location: /koszyk.php');
}