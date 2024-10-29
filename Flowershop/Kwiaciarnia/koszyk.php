<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Kwiaciarnia Warszawa</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
<link rel="stylesheet" href="styles.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php require("phpcode/logregist.php")?>
<?php require("phpcode/header.php")?>
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
if(isset($_COOKIE["id"])){
    $id_user=$_COOKIE["id"];
    $klientorder = $pdo->query("SELECT * FROM `orders` WHERE `id_user`=$id_user AND `condition`='Oczekujace' ");
    $listofklientorder=$klientorder->fetch();
    if($listofklientorder){// jezeli istnieje koszyk
        $id_order=$listofklientorder['id_order'];
        $orderitem = $pdo->query("SELECT * FROM `article_in_order` WHERE `id_order` = $id_order");
        $listorder=$orderitem->fetchAll();
        $sum=0;?>
    <div class="container overflow-hidden text-center">
    <?php
    foreach($listorder as $row){
        $id_article=$row['id_article'];
        $article= $pdo -> query("SELECT * FROM `article` WHERE `id_article` = $id_article");
        $listarticle = $article->fetch();?>
            <div class=" mt-2 row">
                <div class="col col-lg-2">
                    <img src="img/<?= $listarticle['img'] ?>" class="img-fluid img-thumbnail zoomable-image kosz" alt="????">
                </div>
                <div class="col">
                    <p><?= $listarticle['article_name'];?></p>
                </div>
                <div class="col">
                    <?= $row['ilosc'];?>szt
                </div>
                <div class="col">
                    <?php ;
                    $sum+=(float)$listarticle['price'];
                    ?>
                    <?=$listarticle['price']?> zł
                </div>
                <div class="col">
                    <form action="usun_z_koszyka.php" method="POST">
                        <input type="hidden" name="id_article" value="<?= $listarticle['id_article']?>">
                        <input type="hidden" name="id_order" value="<?= $listofklientorder['id_order']?>">
                        <button class="button is-info is-outlined is-small is-responsive" name="usun_z_koszyka" type="submit">
                            usuń
                        </button>
                    </form>
                </div>
            </div>
    <?php } 
    ?>
            <div class="row">
                <div class="col col-lg-2">
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
                <div class="col">
                    <p><strong>Łączna kwota: <?= $sum ?> zł</strong></p>
                </div>
                <div class="col">
                    <form action="phpcode/zlozzamowienie.php" method="POST">
                        <input type="hidden" name="priceorder" value="<?= "$sum" ?>">
                        <button type="submit" name="zlozzamowienie" class="button is-info is-outlined is-medium is-responsive">Zamów</button>
                    </form>
                </div>
            </div>
    </div>
    <?php }
    else{//jezeli koszyk nie istnieje
        echo 'Aktualnie koszyk jest pusty';
    }
 }    
else { ?>
    <div class="container text-center">
        <div class="row">
            <p><a href="logowanie.php">Zaloguj się</a> zeby złożyć zamówienie</p>
        </div>
    </div>
    <?php require("phpcode/footer.php");
    }?>
</body>