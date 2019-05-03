<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController {
    private $modelUsuario;
    private $modelSecurity;
    public function __construct() {
        try {
            $this->modelUsuario= new Usuario ();
            $this->modelSecurity= new Security();
        } catch (Exception $e) {
            die($e->getMessage());
            
        }
    }
    
    public function index(){
        $titulo='';
        require_once 'views/all/header.php';
        require_once 'views/index/index.php';
        require_once 'views/all/footer.php';
    }
    
    //Formulario registro de un nuevo usuario
   public function register(){
       $titulo='';
        require_once 'views/all/header.php';
        require_once 'views/index/register.php';
        require_once 'views/all/footer.php';
   }
   // Formulario para iniciar sesion
   public function login(){
       $titulo='';
        require_once 'views/all/header.php';
        require_once 'views/index/login.php';
        require_once 'views/all/footer.php';
   }
  
    public function store_user(){
        $data=array($_POST['names'],$_POST['email'],$_POST['password']);
        //var_dump = imprime el contenido de un array o vector
        $this->modelUsuario->create($data); 
    }
   public function auth_user(){
       $data=array($_POST['email'],$_POST['password']);
    
     $correo_form=$_POST['email'];
     $password_form=$_POST['password'];
       
   foreach ($this->modelUsuario->consult_email($_POST['email']) as $value){}
   //var_dump ($value);
   
   if(($correo_form==$value->correo)&&($password_form==$value->password)){
       $this->modelSecurity->Auth($correo_form);
       header("location:?c=administrador&m=home");     
             
   }else{
       header("location:?c=index&m=login");
   }
   }
  public function destroy_user(){
  $this->modelSecurity->Destroy();
  header("location:?c=index&m=login");
   
   }
}



//var_dump($data);