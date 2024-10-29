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
if (isset($_REQUEST['dodajdokoszyka']) and isset($_COOKIE["id"])){
    $id_user=$_COOKIE["id"];
    $stmt= $pdo->query("SELECT * FROM `orders` WHERE `id_user`=$id_user AND `orders`.`condition` ='Oczekujace'");
    $call= $pdo->query("SELECT * FROM `user` WHERE `id_user`=$id_user");
    $daneklienta = $call->fetch();
    $order_check = $stmt->fetch();
    $adres=$daneklienta["adres"];
    $id_article=($_GET["id"]);
    $ilosc=1;
    $price=0;
    $status="Oczekujace";
    if($order_check){       //Jezeli uzytkownik ma zamowienia
        $id_order=$order_check["id_order"];
    }
    else{  //Jeżeli nie ma utworz
        $sql= "INSERT INTO `orders` (`id_order`, `id_user`, `condition`, `adres`, `price`) VALUES (NULL, ?, ?, ? , ?);";
        $b=$pdo->prepare($sql)->execute([ $id_user , $status , $adres,  $price]);
        $stmt1= $pdo->query("SELECT * FROM `orders` WHERE `id_user`=$id_user AND `orders`.`condition` ='Oczekujace'");
        $row1= $stmt1->fetch();
        if ($row1){
            $id_order=$row1["id_order"];
        }
        else{
            echo(var_dump($id_user));
            var_dump($status);
            var_dump($adres);
        }
    }
    $sql= 'INSERT INTO `article_in_order`(`id_order`, `id_article` , `ilosc`) VALUES (?,?,?)';
    $pdo->prepare($sql)->execute([$id_order, $id_article , $ilosc]);
    header("Location: /");  
}
else{
    header("Location: /");
}


?>