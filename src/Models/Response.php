<?php

class Response{
   var $status;
   var $msg;
   var $body;

   function __construct ($status,$msg,$body){
    $this->status = $status;
    $this->msg = $msg;
    $this->body = $body;
   }
   
}