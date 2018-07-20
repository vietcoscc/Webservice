<?php
include './../Models/Response.php';
class ApiHelper{
    public static function responseSuccess($msg,$data){
        $response = new Response('success',$msg,$data);
        return json_encode($response);
    }
    public static function responseFail($msg,$data){
        $response = new Response('fail',$msg,$data);
        return json_encode($response);
    }
} 
