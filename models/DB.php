<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of DB
*
* @author APRENDIZ
*/
class DB {
  
   public static function Conectar(){
       try {
           
           $pdo= new PDO('mysql:host=localhost;dbname=sesiones;charset=utf8','root','');
           $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
           return $pdo;
       } catch (Exception $e) {
           die($e->getMessage());

       }
   }
}
