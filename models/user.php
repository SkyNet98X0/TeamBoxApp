<?php

class User{
    private $nickname;
    private $email;
    private $password;

    public function __construct(string $nickname, string $email, string $password){
        $this -> nickname = $nickname;
        $this -> email = $email;
        $this -> password = $password;
    }

    public function get_nickname(){
        return $this -> nickname;
    }

    public function get_email(){
        return $this -> email;
    }

    public function get_password(){
        return $this -> password;
    }

    public function set_nickname($nickname){
        $this -> nickname = $nickname;
    }

    public function set_email($email){
        $this -> email = $email;
    }

    public function set_password($password){
        $this -> password = $password;
    }
}

?>