<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AdministradorController{
    private $modelSecurity;
    public function __construct() {
        try {
        $this->modelSecurity= new Security();
        $this->modelSecurity->ValidateSession();
        } catch (Exception $e) {
          die($e->getMessage());  
        }   
    }


    
            
    public function  home(){
          require_once 'views/all/header.php';
          require_once 'views/administrador/home.php';
          require_once 'views/all/footer.php';
      }
}
    
