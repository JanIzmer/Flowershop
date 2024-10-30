<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Kwiaciarnia Warszawa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    
    <?php require_once("phpcode/logregist.php")?>
    <?php require("phpcode/header.php")?>   
    <?php if((isset($_COOKIE['email'])) && $_COOKIE['email'] == 'admin@admin.pl'): //Admin session start?>
    <?php else: //For all users?>
    <?php
        require 'base.php';
        try{
            $pdo =new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        $result = $pdo->query("SELECT * FROM article");
    ?>
        <div class="container-fluid grid-container">
                <div class="grid-item item1">
                <div class="hero-text whitetext"></div>
                </div>
                <div class="grid-item item2"></div>
                <div class="grid-item item3 "><p class="whitetext"><strong>DOSTAWA JUZ DZISIAJ!</strong></p></div>
                <div class="grid-item item4"><h2>Jakie kwiaty wybierasz dzisiaj?</h2></div>
        </div>
        <div class="container text-center">
                <div class="row gx-5 gy-5 row-cols-4">
                <?php
                foreach($result as list($idarticle ,$article, $amount, $price, $img, $opis)){?>
                    <div class="col">
                        
                        <form action="/towarszczegoly.php?id=<?=$idarticle?>" method="post">
                            <input type="hidden" name="itemId" value="<?= $idarticle ?>">
                            <button name="action" value="blue" class="btn btn-link"> <img src="img/<?=$img ?>" class="img-fluid img-thumbnail zoomable-image" alt="<?=$article?>"> </button>
                        </form>
                        <p><?=$article?><br><strong><?=$price?> zł</strong></p>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php require("phpcode/footer.php")?>
    <?php endif;?>
    </body>
</html>