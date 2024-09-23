<?php 
require('../utils/db.php');

if(isset($_POST)){

    if($_POST['password'] != $_POST['confirm_password']){
        $_SESSION['err_message'] = 'Las contraseñas no coinciden';
        header('Location: ./register.php');
    } else {

        
        
        $query = 'select * from user where email = :email';
        $params = [
            ":email" => $_POST['email']
        ];
        
        $res = $conn -> select_one($query, $params);
        
        if(!$res){
            $params = [
                ":nickname" => $_POST['nickname'],
                ":email" => $_POST['email'],
                ":password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ];
            
            $conn -> insert(I_USER, $params);
            
            $_SESSION['message'] = 'Registro exitoso';
            header('Location: ./login.php');
        } 
        else {
            $_SESSION['message'] = 'Task Saved Succesfully';
            header('Location: ./register.php');
        }
        
    }

} else {
    header('Location: ./register.php');
}

?>
