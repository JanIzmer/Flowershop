<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Kwiaciarnia Warszawa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    
    <?php
    require 'base.php';
    try{
    $pdo =new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }
    require_once("header.php");
    if(isset($_COOKIE['email']) and $_COOKIE['email'] == 'admin@admin.pl'){
        $sum=0.00;
        $req=$pdo->query("SELECT `price` FROM `orders` WHERE `condition` IN ('W realizacji','Zrealizowane') AND `price` != 0");
        $all=$req->fetchAll();
        foreach($all as $num){
            $sum+=$num['price'];
            $arr[]=(float)$num['price'];
        }?>
        <div class="container text-center">
            <div class="mt-3 row">
                <div class="col">
                <p>Suma wszystkich zamowień </p>
                </div>
                <div class="col">
                <p>Minimalna wartość zamowienia</p>
                </div>
                <div class="col">
                <p>Maksymalna wartość zamówienia</p>   
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><?= $sum ?> zł </p>
                </div>
                <div class="col">
                    <p><?= min($arr)?> zł</p>
                </div>
                <div class="col">
                    <p><?= max($arr)?> zł</p>   
                </div>
            </div>
        </div>
    <?php }

    ?>



    </body>
</html>