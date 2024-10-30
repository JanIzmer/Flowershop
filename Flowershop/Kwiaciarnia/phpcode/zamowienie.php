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
    $result = $pdo->query("SELECT * FROM article_in_order");
    $article= $pdo->query("SELECT * FROM article");
    $order= $pdo->query("SELECT * FROM orders");
    $user= $pdo->query("SELECT * FROM user");
    require_once("header.php");
    if(isset($_COOKIE['email']) and $_COOKIE['email'] == 'admin@admin.pl'){
    ?>
    <div class="table-responsive">
            <table class="table table-primary table-striped ">
                
                <tr>
                    <th>Id_zamowienia</th>
                    <th>Klient</th>
                    <th>Email</th>
                    <th>Adres Zamówienia</th>
                    <th>Art w zam</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <th>
                        <form action="zamowienie.php" method="post">
                            <input type="text" name="searchforid">
                            <input type="hidden" name="szukaj">
                            <button type="submit" class="btn btn-outline-secondary"
                            style="--bs-btn-padding-y: .5px; --bs-btn-padding-x: .5px; --bs-btn-font-size: .5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                            </button>
                        </form>
                    </th>
                    <th>  
                    </th>
                    <th> 
                    </th>
                    <th>
                    </th>
                    <th>
                    </th>
                    <th>
                        <form action="zamowienie.php" method="post">
                            <input type="text" name="statussearch">
                            <input type="hidden" name="szukaj">
                            <button type="submit" class="btn btn-outline-secondary"
                            style="--bs-btn-padding-y: .5px; --bs-btn-padding-x: .5px; --bs-btn-font-size: .5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                            </button>
                        </form>
                    </th>
                </tr>
            <?php
                    if(isset($_POST["szukaj"])==FALSE) {
                        foreach($order as $row){
                            switch($row["condition"]){
                                case "Oczekujące":
                                    $kolor="table-danger";
                                    break;
                                case "Oczekujace":
                                    $kolor="table-danger";
                                    break;
                                case "W realizacji":
                                    $kolor="table-warning";
                                    break;
                                default :
                                    $kolor="table-success";
                            }
                        ?>
                        <tr class="<?= $kolor ?>">
                        <td> 
                            <?= $row["id_order"]?>
                        </td>
                        <?php $stmt = $pdo->prepare("SELECT * FROM user WHERE id_user = ?");
                              $stmt->execute([$row["id_user"]]);
                              $user = $stmt->fetch();      
                        ?>
                        <td> 
                            <?php  echo "$user[firstname]" . " " . "$user[secondname]"; ?>
                        </td>
                        <td> 
                            <?php  echo "$user[email]"; ?>
                        </td>
                        <td> 
                            <?php echo "$row[adres]";?>
                        </td>
                        <?php $stmt = $pdo->prepare("SELECT * FROM article_in_order WHERE id_order  = ?");
                              $stmt->execute([$row["id_order"]]);
                              $art = $stmt->fetchAll();      
                        ?>
                        <td>
                        <?php 
                        foreach ($art as $row1) {  
                            $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article  = ?");
                            $stmt->execute([$row1["id_article"]]);
                            $artname = $stmt->fetch(); 
                            echo "<strong>$artname[article_name]</strong>"." ilość: ". "$row1[ilosc]"." szt";
                            echo "<br>";
                        }
                        ?>
                        </td>
                        <td> 
                            <?php echo $row["condition"]?>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="deleteid" value="<?= $row["id_order"]?>">
                                <button type="submit" name="usun_zamowienie" class="btn btn-outline-secondary">Usuń</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                }
                    else{
                        if(isset($_POST["searchforid"])){
                            $parametr=(int)$_POST["searchforid"];
                            $order=$pdo->query("SELECT * FROM `orders` WHERE id_order = $parametr ");//ok
                        }
                        elseif(isset($_POST["statussearch"])){
                            $parametr=$_POST["statussearch"];
                            $order=$pdo->query("SELECT * FROM `orders` WHERE `condition` LIKE '%$parametr%' ");
                        }
                        $f = $order->fetchAll();
                        foreach ($f as $row){
                            switch($row["condition"]){
                                case "Oczekujące":
                                    $kolor="table-danger";
                                    break;
                                case "Oczekujace":
                                    $kolor="table-danger";
                                    break;
                                case "W realizacji":
                                    $kolor="table-warning";
                                    break;
                                default :
                                    $kolor="table-success";
                            }
                        ?>
                        <tr class="<?= $kolor ?>">
                            <td> 
                                <?= $row["id_order"]?>
                            </td>
                            <?php $stmt = $pdo->prepare("SELECT * FROM user WHERE id_user = ?");
                                $stmt->execute([$row["id_user"]]);
                                $user = $stmt->fetch();      
                            ?>
                            <td> 
                                <?php  echo "$user[firstname]" . " " . "$user[secondname]"; ?>
                            </td>
                            <td> 
                                <?php  echo "$user[email]"; ?>
                            </td>
                            <td> 
                                <?php echo "$row[adres]";?>
                            </td>
                            <?php $stmt = $pdo->prepare("SELECT * FROM article_in_order WHERE id_order  = ?");
                                $stmt->execute([$row["id_order"]]);
                                $art = $stmt->fetchAll();      
                            ?>
                            <td>
                            <?php 
                            foreach ($art as $row1) {  
                                $stmt = $pdo->prepare("SELECT * FROM article WHERE id_article  = ?");
                                $stmt->execute([$row1["id_article"]]);
                                $artname = $stmt->fetch(); 
                                echo "<strong>$artname[article_name]</strong>"." ilość: ". "$row1[ilosc]"." szt";
                                echo "<br>";
                            }
                            ?>
                            </td>
                            <td> 
                                <?php echo $row["condition"]?>
                            </td>
                        </tr>
                    <?php
                    }
                }
    }
            ?> 
                
</body>
</html>
    

