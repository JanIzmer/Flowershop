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
        $result = $pdo->query("SELECT * FROM article");
        if($_COOKIE['email'] == 'admin@admin.pl'){
        require_once("header.php");?>
        <div class="table-responsive">
            <table class="table table-primary table-striped ">
                <tr>
                    <th>Id</th>
                    <th>Nazwa kwiatów</th>
                    <th>Ilość na stanie</th>
                    <th>Cena za sztuke</th>
                    <th>Zdjęcie</th>
                </tr>
                
            <?php
                foreach($result as $row){?>
                    <tr>
                        <td> <?= $row["id_article"]?></td>
                        <td> <?= $row["article_name"]?></td>
                        <td> <?= $row["amount"]?></td>
                        <td> <?= $row["price"]?></td>
                        <td> <?= $row["img"]?></td>
                    </tr>
                <?php
            }
            ?>
            </table>
        </div><h4>Wyszukaj artykuł/Wyszukaj i zmień</h4>
            <form action="article.php" method="post">
                <input class="form-control form-control-lg" type="text" name="search" id="search" placeholder="Wpisz nazwe artykułu" class="form-control">
                <button type="submit" class="btn btn-info">Wyszukaj</button>
            </form>
            <?php
            $result = $pdo->query("SELECT * FROM article");
            if(isset($_POST["search"])){
                $search=$_POST["search"];?>
                <table class="table table-borderless">
                <tr>
                    <th>Id</th>
                    <th>Nazwa kwiatów</th>
                    <th>Ilość na stanie</th>
                    <th>Cena za sztuke</th>
                </tr>
                <?php
                foreach($result as list($idinsearch ,$articleinsearch, $amountinsearch, $priceinsearch)){
                    if (preg_match( "~\w*$search\w*~iu" , $articleinsearch) && $_POST["search"]!=""){
                        ?>
                            <tr>
                                <td> <?= $idinsearch?></td>
                                <td> <?= $articleinsearch?></td>
                                <td> <?= $amountinsearch?></td>
                                <td> <?= $priceinsearch?></td>
                                <td>
                                <form action="article.php" method="post">
                                <button type="submit" class="btn btn-info" name="change<?= $idinsearch?>">Zmień</button>
                                </form>
                                </td>
                                <td>
                                <form action="article.php" method="post">
                                <button type="submit" class="btn btn-warning" name="delete<?= $idinsearch?>">Usuń</button>
                                </form>
                                </td>
                            </tr>
                         <?php
                        
                    }
                    else{
                        continue;
                    }
                }?>
                </table>
            <?php
            }for($i=1;$i<50;$i++){
                if(isset($_POST["change".$i])){
                    require('update.php')?>
                    <form action="update.php" method="post">
                        <input class="form-control form-control-lg" type="text" for="articlenamechange" name="articlenamechange" placeholder="Nowa nazwa" class="form-control">
                        <input class="form-control form-control-lg" type="number" name="amountchange" id="amount" placeholder="Nowa ilość" class="form-control">
                        <input class="form-control form-control-lg" type="number" name="pricechange" id="price" min="0" step="0.01" placeholder="Nowa cena" class="form-control">
                        <input type="hidden" name="id" value= <?=$i?>>
                        <button type="submit" class="btn btn-warning" name=<?=$i?>>Zmień</button>
                    </form>
                    <?php
                }
                elseif(isset($_POST["delete".$i])){
                    require('delete.php')?>
                    <form action="delete.php" method="post">
                        <h4>Na pewno chcesz usunąć artykuł?</h4>
                        <input type="hidden" name="id" value= <?=$i?>>
                        <button type="submit" class="btn btn-info" name="Yes">Tak</button>
                        <button type="submit" class="btn btn-warning" name="No">Nie</button>
                    </form>
                    <?php
                }
            }
            ?>
            <h4>Dodaj artykuł</h4>
            <form action="dodajarticle.php" method="post">
                <input class="form-control form-control-lg" type="text" name="articlename" placeholder="Nazwa" class="form-control">
                <input class="form-control form-control-lg" type="number" name="amount" placeholder="Ilość" class="form-control">
                <input class="form-control form-control-lg" type="number" name="price" placeholder="Cena" min="0" step="0.01" class="form-control">
                <input class="form-control form-control-lg" name="picture" placeholder="Picture" class="form-control">
                <button type="submit" class="btn btn-info" name="sendtask">Dodaj</button>
            </form>
            <?php
        }
        else{
            header("Location: logowanie.php");
        }?>
    </body>
    </html>