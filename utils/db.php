<?php


session_start();
require('../vendor/autoload.php');
require('../utils/querys.php');

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv -> load();

class Connection{
    private $conn;

    public function connect(){
        $host = $_ENV['DB_HOST'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];
        $name = $_ENV['DB_NAME'];

        $cnx_string = "mysql:host=$host;dbname=$name;charset=utf8";

        try{
           $this -> conn = new PDO($cnx_string, $user, $pass);

           $this -> conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            $this -> conn = 'Error de conexión';
            echo "ERROR: " . $e -> getMessage();
        }
    }

    public function exec_query($query, $params = []){
        $this -> connect();

        if($this -> conn){
            try{
                $cursor = $this -> conn -> prepare($query);
                return $cursor -> execute($params);
            } catch(PDOException $e){
                echo "Error en la consulta" . $e -> getMessage();
                return false;
            }
        }
        
        return false;
    }

    public function select_all($query, $params = []){
        $this -> connect();

        if($this -> conn) {
            try {
                $cursor = $this -> conn -> prepare($query);
                $cursor -> execute($params);
                return $cursor -> fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e -> getMessage();
                return false;
            } finally {
                $cursor = null;
            }
        }
        return false;
    }

    public function select_one($query, $params = []){
        $this -> connect();

        if($this -> conn) {
            try {
                $cursor = $this -> conn -> prepare($query);
                $cursor -> execute($params);
                return $cursor -> fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error en la consulta: " . $e -> getMessage();
                return false;
            } finally {
                $cursor = null;
            }
        }
        return false;
    }

    public function insert($query, $params = []){
        $this -> connect();

        if($this -> conn){

            $this -> conn -> beginTransaction();

            try {

                $cursor = $this -> conn -> prepare($query);
                $cursor -> execute($params);
                $this -> conn -> commit();
                return $cursor -> fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $e) {
                $this -> conn -> rollBack();
                echo "Error en la consulta: " . $e -> getMessage();
                return false;

            } finally {
                $cursor = null;
            }
        }

        return false;
    }

}

$conn = new Connection();

?>