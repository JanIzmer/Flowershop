<?php
    require 'logregist.php';
    setcookie('user',$userRow['passwordhash'], time() - 3600, "/");
    setcookie('name',$userRow['firstname'], time() - 3600, "/");
    setcookie('email',$userRow['email'], time() - 3600, "/");
    setcookie('id',$userRow['id_user'], time() - 3600, "/");
    header("Location: /");
?>