<?php
    require 'base.php';
    $pdo =new PDO($dsn, $user, $pass);
    //dodac sprawdzenie połączenia
    $result = $pdo->query("SELECT * FROM user");
    if(isset($_REQUEST['firstnamechange'])){
        if($_REQUEST['firstnamechange']!=''){
        $sql= 'UPDATE user SET firstname = :firstname  WHERE id_user = :id';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(":firstname" , $_REQUEST['firstnamechange']);
        $statement->bindValue(":id", $_REQUEST['id']);
        $abs=$statement->execute();
        header("Location: klient.php");
        }
    }
    if(isset($_REQUEST['secondnamechange'])){
        if($_REQUEST['secondnamechange']!=''){
        $sql= 'UPDATE user SET secondname = :secondname  WHERE id_user = :id';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(":secondname" , $_REQUEST['secondnamechange']);
        $statement->bindValue(":id", $_REQUEST['id']);
        $abs=$statement->execute();
        header("Location: klient.php");
        }
    }
    if(isset($_REQUEST['emailchange'])){
        if($_REQUEST['emailchange']!=''){
        $sql= 'UPDATE user SET email = :email  WHERE id_user = :id';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(":email" , $_REQUEST['emailchange']);
        $statement->bindValue(":id", $_REQUEST['id']);
        $abs=$statement->execute();
        header("Location: klient.php");
        }
    }
    if(isset($_REQUEST['adreschange'])){
        if($_REQUEST['adreschange']!=''){
        $sql= 'UPDATE user SET adres= :adres  WHERE id_user = :id';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(":adres" , $_REQUEST['adreschange']);
        $statement->bindValue(":id", $_REQUEST['id']);
        $abs=$statement->execute();
        header("Location: klient.php");
        }
        else{
            header("Location: klient.php");
        }
    }
    else{
        header("Location: klient.php");
    }
    

    
?>