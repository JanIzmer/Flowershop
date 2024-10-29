<!doctype html>
<html lang='en'>
<head>
    <link rel='stylesheet' href='styles.css'>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Kwiaciarnia Warszawa</title>
</head>
<body>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
    <?php require('phpcode/logregist.php')?>
    <?php require('phpcode/header.php')?>
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
    $a=$_GET["id"];
    $result = $pdo->query("SELECT * FROM article where id_article=$a");
        $dane=$result->fetch();
            ?>
            <div class='container'>
                <div class='row'>
                    <div class='col opis'>
                        <img src='img/<?= $dane['img']?>' class='imgmaxwidth550 img-fluid img-thumbnail mx-auto d-block ' alt='$article'>
                    </div>
                    <div class='col opis'>                                        
                        <h2><strong><?= $dane['article_name']?></strong></h2>
                        <h5><?= $dane['opis']?></h5>
                        <h6 class='opis'><em>Należy pamiętać, że kwiaty są żywe i kompozycja może nieco różnić się od przykładu zamieszczonego na zdjęciach odcieniem, kształtem, zestawem. Ale nie martw się tym, Twoja kompozycja będzie nie mniej piękna!</en></h6>
                        <p class='cena'><strong><?= $dane['price']?> zł</strong></p>
                        <form action='/dodajdokoszyka.php?id=<?= $dane['id_article']?>' method='post'>
                            <input type='hidden' name='dodajdokoszyka'>
                            <?php if (isset($_COOKIE['id'])) { ?>
                                <button type='submit' class='btn btn-light'>Doddaj do koszyka</button>
                            <?php } 
                             else { ?>
                                <button class="btn btn-light btn-lg" title="Disabled button" disabled>Doddaj do koszyka</button>
                                <p><a id="logowanie "href="logowanie.php">Zaloguj się  </a>zeby złożyć zamówienie</p>
                        <?php } ?>
                        </form>
                    </div>
                </div>
            </div>   
<?php require("phpcode/footer.php")
?>
</body>
</html>