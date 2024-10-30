<?php
require 'base.php';
try{
    $pdo =new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}
if(isset($_POST['articlename'])){
                $articlename=$_POST['articlename'];
                $amounte=$_POST['amount'];
                $price=$_POST['price'];
                $img=$_POST['picture'];
                $opis="";
                if($articlename!='' and $amounte!='' and $price!=''){
                    $sql= 'INSERT INTO article(article_name, amount, price, img, opis) VALUES (?,?,?,?,?)';
                    $pdo->prepare($sql)->execute([$articlename, $amounte, $price, $img, $opis]);
                    header("Location: article.php");
                }
                else{
                    header("Location: article.php");?>
                <?php   
                }
            }
?>