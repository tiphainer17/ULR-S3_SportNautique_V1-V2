<?php
class Connexion{

    private $_host = "localhost";
    private $_db_name = "SportNautique";
    private $_username = "phpmyadmin";
    private $_password = "phpmypasswd";
    private $_conn;


    public function connexion(){

        $this->_conn = null;

        try{
            $this->_conn = new \PDO("mysql:host=" . $this->_host . ";dbname=" . $this->_db_name, $this->_username, $this->_password);
            $this->_conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->_conn;
    }
}
?>
