<?php
require('../utils/db.php');

if(isset($_POST)){

    $params = [
        ":email" => $_POST['email']
    ];

    $res = $conn -> select_one(S_BY_EMAIL, $params);

    if(!$res){
        $_SESSION['err_message'] = 'Usuario o contraseña incorrecta';
        header('Location: ./login.php');
    }

    if($_POST['password'] != password_verify($_POST['password'], $res['password'])){
        $_SESSION['err_message'] = 'Usuario o contraseña incorrecta';
        header('Location: ./login.php');
    } else {
        header('Location: ./chat.php');
    }

}
?>