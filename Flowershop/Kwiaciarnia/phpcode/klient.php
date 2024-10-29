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
        $result = $pdo->query("SELECT * FROM user");
        if($_COOKIE['email'] == 'admin@admin.pl'){
        require_once("header.php");
        ?>
        <div class="table-responsive">
            <table class="table table-primary table-striped ">
                <tr>
                    <th>Id</th>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Email</th>
                    <th>Adres</th>
                </tr>
            <?php
                foreach($result as $row){?>
                    <tr>
                        <td> <?= $row["id_user"]?></td>
                        <td> <?= $row["firstname"]?></td>
                        <td> <?= $row["secondname"]?></td>
                        <td> <?= $row["email"]?></td>
                        <td> <?= $row["adres"]?></td>
                    </tr>
                <?php
            }
            ?>
            </table>
        </div><h4>Wyszukaj klienta/Wyszukaj i zmień dane klienta</h4>
            <form action="klient.php" method="post">
                <input class="form-control form-control-lg" type="text" name="search" id="search" placeholder="Wpisz email lub imie lub nazwisko" class="form-control">
                <button type="submit" class="btn btn-info">Wyszukaj</button>
            </form>
            <?php
            $result = $pdo->query("SELECT * FROM user");
            if(isset($_POST["search"])){
                $search=$_POST["search"];?>
                <table class="table table-borderless">
                <tr>
                    <th>Id</th>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Email</th>
                    <th>Adres</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                foreach($result as list($idklientinsearch ,$firstnameinsearch, $secondnameinsearch, $emailinsearch,$hash,$adresinsearch)){
                    if ((preg_match( "~\w*$search\w*~iu" , $emailinsearch) or preg_match( "~\w*$search\w*~iu" , $firstnameinsearch) or preg_match( "~\w*$search\w*~iu" , $secondnameinsearch)) && $_POST["search"]!=""){
                        ?>
                            <tr>
                                <td> <?= $idklientinsearch?></td>
                                <td> <?= $firstnameinsearch?></td>
                                <td> <?= $secondnameinsearch?></td>
                                <td> <?= $emailinsearch?></td>
                                <td> <?=$adresinsearch?></td>
                                <td>
                                <form action="klient.php" method="post">
                                <button type="submit" class="btn btn-info" name="change<?= $idklientinsearch?>">Zmień</button>
                                </form>
                                </td>
                                <td>
                                <form action="klient.php" method="post">
                                <button type="submit" class="btn btn-warning" name="delete<?= $idklientinsearch?>">Usuń</button>
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
                    ?>
                    <form action="updateklient.php" method="post">
                        <input class="form-control form-control-lg" type="text"  name="firstnamechange" placeholder="Imię">
                        <input class="form-control form-control-lg" type="text" name="secondnamechange"  placeholder="Nazwisko">
                        <input class="form-control form-control-lg" type="email" name="emailchange" placeholder="Email">
                        <input class="form-control form-control-lg" type="text" name="adreschange" placeholder="Adres">
                        <input type="hidden" name="id" value= <?=$i?>>
                        <button type="submit" class="btn btn-warning" name=<?=$i?>>Zmień</button>
                    </form>
                    <?php
                }
                elseif(isset($_POST["delete".$i])){
                    ?>
                    <form action="delete.php" method="post">
                        <h4>Na pewno chcesz usunąć dane klienta?</h4>
                        <input type="hidden" name="id" value= <?=$i?>>
                        <button type="submit" class="btn btn-info" name="Deleteklient">Tak</button>
                        <button type="submit" class="btn btn-warning" name="No">Nie</button>
                    </form>
                    <?php
                }
            }
            ?>
            <h4>Dodaj klienta</h4>
            <form action="klient.php" method="post">
                <input class="form-control form-control-lg" type="text" name="firstname" placeholder="Imie" >
                <input class="form-control form-control-lg" type="textr" name="secondname" placeholder="Nazwisko" >
                <input class="form-control form-control-lg" type="email" name="email" placeholder="Email">
                <input class="form-control form-control-lg" type="text" name="adres" placeholder="Adres">
                <input class="form-control form-control-lg" type="text" name="passwordhash" placeholder="Hasło">
                <button type="submit" class="btn btn-info" name="sendtask">Dodaj</button>
            </form>
            <?php
            if(isset($_POST['sendtask'])){
                $result = $pdo->query("SELECT * FROM user");
                $firstname=$_POST['firstname'];
                $secondname=$_POST['secondname'];
                $email=$_POST['email'];
                $password = $_REQUEST['passwordhash'];
                $passhash=password_hash($password, PASSWORD_ARGON2I);
                $adres=$_POST['adres'];

                if($firstname!='' and $secondname!='' and $email!='' and $adres!=''){
                    $sql= 'INSERT INTO user(firstname, secondname, email, passwordhash, adres) VALUES (?,?,?,?,?)';
                    $pdo->prepare($sql)->execute([$firstname, $secondname, $email,$passhash,$adres]);
                    header("Location: klient.php");

                }
            }
    }
    else{
        header("Location: /");
    }?>


    
    </body>
    </html>