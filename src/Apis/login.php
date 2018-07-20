<?php
require __DIR__.'./../../vendor/autoload.php';
include_once './../Helpers/ApiHelper.php';
include_once './../Models/Connection.php';
use \Firebase\JWT\JWT;

function loginValidate(){
    if(!isset($_POST['password'])){
        echo ApiHelper::responseFail('Chưa nhập mật khẩu','');
        die();
    }
}
function login($password){
    $connection = new Connection();
    $con = $connection->getConnection();
    $md5 = md5($password);
    $sql = "SELECT * FROM admin WHERE password='$md5'";
    $check = false;
    $results = mysqli_query($con,$sql);
    while($row = $results->fetch_assoc()){
        $check = true;
    }
    if($check){
        $key = "key";
        $token = JWT::encode($password, $key);
        echo ApiHelper::responseFail('Đăng nhập thành công',['token'=>$token]);
    }else{
        echo ApiHelper::responseFail('Đăng nhập thất bại','');
    }
}
loginValidation();
login($_POST['password']);

// $decoded = JWT::decode($jwt, $key, array('HS256'));
// Đọc thêm về cách tạo token https://github.com/firebase/php-jwt
// http://localhost/Websevice/src/Apis/login.php