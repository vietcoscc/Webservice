<?php
include_once './../Helpers/ApiHelper.php';
class Connection{
    var $host = 'localhost';
    var $userName = 'root';
    var $password = '';
    var $database =  'egm';
    var $connection = null;
    
    function __construct(){
        $this->connection  = mysqli_connect($this->host,$this->userName,$this->password,$this->database);
        if(!$this->connection){
            echo ApiHelper::responseFail('Kết nối databse thất bại','');
            die();
        }
    }

    public function getConnection(){
        return $this->connection;
    }
}