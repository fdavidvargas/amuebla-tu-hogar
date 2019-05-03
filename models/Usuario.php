<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Usuario extends DB{
    
    //crear un nuevo usuario

    public function create($data){
        try {
          $stm=parent::conectar()->prepare("INSERT INTO usuarios (nombres,correo,password)VALUES(?,?,?)");  
          //bindparam = uno por cada (?) que se encuentre en la query
          $stm->bindParam(1, $data['0'],PDO::PARAM_STR);
          $stm->bindParam(2, $data['1'],PDO::PARAM_STR);
          $stm->bindParam(3, $data['2'],PDO::PARAM_STR);
          $stm->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //consultar todos los usuarios registrados
    public function consult(){
        try {
            
        } catch (Exception $e) {
            
        }
    }
    
    // funcion para consultar por email
    public function consult_email($correo){
        try {
            $stm= parent::Conectar()->prepare ("SELECT * FROM usuarios WHERE correo = ?");
            $stm->bindParam(1, $correo,PDO::PARAM_STR);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e){
              die($e->getMessage());
    }
    }

}
