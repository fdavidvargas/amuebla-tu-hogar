<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Security extends DB {
    
    public function Auth ($correo){
        try {
            $stm= parent::Conectar()->prepare ("SELECT * FROM usuarios WHERE correo = ?");
            $stm->bindParam(1,$correo, PDO::PARAM_STR);
            $stm->execute();
            $_SESSION['USER']=$stm->fetch(PDO::FETCH_OBJ);
            //diferencia entre fecth y fecthAll ?  
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    // desinicializa las varianles de sesion creadas en el sistema
    // y despues las destruye
    public function Destroy (){
        try {
            //unset = eliminar el valor de una variable y la deja vacia
            unset($_SESSION['USER']);
            // destruye todas las variables $_SESSION[] que existan en la plataforma
            session_destroy();
            
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    // valida si la sesion de un usuario esta activa y de no ser asi lo sacara de inmediato de la pagina donde
    // no tiene permiso
    public function ValidateSession (){
     
        if(!isset($_SESSION['USER']) or is_null($_SESSION['USER'])){
        header("location:?c=index&m=login");
        
          }
    }
}