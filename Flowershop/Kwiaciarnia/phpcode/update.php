<?php
    require 'base.php';
    $pdo =new PDO($dsn, $user, $pass);
    //dodac sprawdzenie połączenia
    $result = $pdo->query("SELECT * FROM article");
    if(isset($_REQUEST['articlenamechange'])){
        if($_REQUEST['articlenamechange']!=''){
        $sql= 'UPDATE article SET article_name = :articlename  WHERE id_article = :id';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(":articlename" , $_REQUEST['articlenamechange']);
        $statement->bindValue(":id", $_REQUEST['id']);
        $abs=$statement->execute();
        header("Location: article.php");
        }
    }
    if(isset($_REQUEST["pricechange"])){
        if($_REQUEST['pricechange']!=''){
        $sql= 'UPDATE article SET price = :price  WHERE id_article = :id';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(":price" , $_REQUEST['pricechange']);
        $statement->bindValue(":id", $_REQUEST['id']);
        $abs=$statement->execute();
        header("Location: article.php");
        }
    }
    if(isset($_REQUEST["amountchange"])){
        if($_REQUEST['amountchange']!=''){
        $sql= 'UPDATE article SET amount = :amount  WHERE id_article = :id';
        $statement=$pdo->prepare($sql);
        $statement->bindValue(":amount" , $_REQUEST['amountchange']);
        $statement->bindValue(":id", $_REQUEST['id']);
        $abs=$statement->execute();
        header("Location: article.php");
        }
    }

    
?>
