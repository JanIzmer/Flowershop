<?php
    $db = new mysqli("localhost","root","","flowershop");
    $db->query("SELECT * FROM user");
if (isset($_REQUEST['action']) && $_REQUEST['action']=="login"){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $q= $db->prepare("SELECT * FROM user WHERE email=? LIMIT 1");
    $q->bind_param('s', $email);
    $q->execute();
    $result = $q->get_result();
    $userRow = $result->fetch_assoc();

    if ($userRow==NULL){
        header("Location: /logowanie.php");
    }
    else{
        if (password_verify($password, $userRow['passwordhash'])){
            setcookie('user',$userRow['passwordhash'], time() + 3600, "/");
            setcookie('name',$userRow['firstname'], time() + 3600, "/");
            setcookie('email',$userRow['email'], time() + 3600, "/");
            setcookie('id',$userRow['id_user'], time() + 3600, "/");
            setcookie('warning', $warning , time() - 10, "/");
            header("Location: /");
        }
        else{
            header("Location: /logowanie.php");
            $warning="Błedny login lub hasło.";
            setcookie('warning', $warning , time() + 10, "/");
        }
    }
}

if (isset($_REQUEST['action'])&& $_REQUEST['action']=="register"){
    $email = $_REQUEST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = $_REQUEST['password'];
    $passwordRepeat = $_REQUEST['passwordRepeat'];
    $firstname = $_REQUEST['firstname'];
    $secondname = $_REQUEST['secondname'];
    $adres="";
    if ($password==$passwordRepeat && $password!='' && $email!=''){
        if ($password==$passwordRepeat){
            $q = $db->prepare("INSERT INTO user VALUES (NULL, ?, ?, ?, ?, ?)");
            $passwordHash = password_hash($password, PASSWORD_ARGON2I);
            $q->bind_param("sssss", $firstname ,$secondname , $email, $passwordHash, $adres);
            $result = $q->execute();
            if($result) {
                header("Location: /logowanie.php");
            }
    }
    else{
        header("Location: /logowanie.php");
    }
    }
    else{
    header("Location: /register.php");
}
}


?>

