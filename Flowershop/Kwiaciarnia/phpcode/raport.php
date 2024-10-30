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
    if(isset($_COOKIE['email']) and $_COOKIE['email'] == 'admin@admin.pl'){?>
        <div class="table-responsive">
            <table class="table table-primary table-striped ">
                
                <tr>
                    <th>Id_klienta</th>
                    <th>Klient</th>
                    <th>Email</th>
                    <th>Id_zamowienia</th>
                    <th>Adres Zamówienia</th>
                    <th>Art w zam</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <th>
                        <form action="raport.php" method="post">
                            <input type="text" name="idklient">
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
                    <th></th>
                    </th>
                    <th>
                        
                    </th>
                </tr>

    <?php
        if(isset($_POST['idklient'])) {
            $search=(int)$_POST['idklient'];
            $req_user=$pdo-> prepare("SELECT * FROM `user` WHERE `id_user` = ? ");
            $req_order=$pdo-> prepare('SELECT * FROM `orders` WHERE `id_user` = ?');
        }
        elseif(isset($_POST['nameklient'])) {
            $search=$_POST['nameklient'];
            $req_user=$pdo-> prepare("SELECT * FROM `user` WHERE `firstname` = ?" );
            $req_order=$pdo-> prepare('SELECT * FROM `orders` WHERE `id_user` = ?');
        }
        if(isset($_POST['nameklient']) or (isset($_POST['idklient'])))   {
            $req_user->execute([$search]);
            $user_arr= $req_user->fetch();
            $req_order->execute([$search]);
            $order_arr=$req_order->fetchAll();
            foreach($order_arr as $row){?>
                        <tr >
                            <td> 
                                <p><?php echo $row['id_user']?></p>
                            </td>
                            <td> 
                                <?php   echo $user_arr['firstname'] ?>
                            </td>
                            <td> 
                                <?php  echo $user_arr['email']; ?>
                            </td>
                            <td> 
                                <?php echo $row['id_order'];?>
                            </td>
                            <?php      
                            ?>
                            <td>
                                <?php echo $row['adres'];?>
                            </td>
                            <td> 
                                <?php 
                                $artinord=$pdo->prepare("SELECT `id_article` FROM `article_in_order` WHERE id_order= ?");
                                $artinord->execute([$row['id_order']]);
                                $articleinord_arr = $artinord->fetchAll();
                                foreach($articleinord_arr as $row1){
                                    $s=$pdo->prepare("SELECT * FROM `flowershop`.`article` WHERE `id_article` = ?");
                                    $s->execute([$row1["id_article"]]);
                                    $m=$s->fetch();
                                    //echo($m['article_name']);?>
                                
                                    <p><?=$m['article_name']?></p>
                                <?php }?>
                            </td>
                            <td>
                                <?php echo $row['condition'];?>
                            </td>
                        </tr>
                        <?php 
                        }   
                    } 
                }
                
    
    ?>



    </body>
</html>