<?php
class Message{
    private $id_room;
    private $id_user;
    private $type;
    private $content;
    private $url;

    public function __construct(int $id_room, int $id_user, string $type, string $content, string $url){
        $this -> id_room = $id_room;
        $this -> id_user = $id_user;
        $this -> type = $type;
        $this -> $content = $content;
        $this -> $url = $url;
    }

    public function get_content(){
        return $this -> content;
    }

    public function get_url(){
        return $this -> url;
    }

    public function set_content($content){
        $this -> content = $content;
    }
}

?>