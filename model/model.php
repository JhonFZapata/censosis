<?php
session_start();
  class Model
  {

    private $request;
    private $response;

    function __construct(){
      $this->request=MySQL::conectar();
    }

    function findUser($user){
        try {
          $h = $this->request->prepare("SELECT DOCUMENT, PASSWORD FROM tbl_users WHERE DOCUMENT=:document AND PASSWORD=:password");
          $h->bindParam(':document', $user['document'], PDO::PARAM_STR);
          $h->bindParam(':password', $user['password'], PDO::PARAM_STR);
          $h->execute();
          $resultado = $h->fetchALL(PDO::FETCH_OBJ);
          
        }catch (\Exception $e) {}
        
        return    $resultado;
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
        // echo "<pre>";
        // print_r($resultado);
        // echo "</pre>";
    }
    
    function getPersons(){
        try {
          // $this->peticion->query("SET NAMES 'utf8'");
          $h = $this->request->prepare("SELECT * FROM tbl_personas");
          $h->execute();
          // $c=$h->rowCount();
          $resultado = $h->fetchALL(PDO::FETCH_OBJ);
          
          return    $resultado;
        }catch (\Exception $e) {}
    }
    
    function getPhones(){
        try {
          // $this->peticion->query("SET NAMES 'utf8'");
          $h = $this->request->prepare("SELECT * FROM tbl_lideres");
          $h->execute();
          // $c=$h->rowCount();
          $resultado = $h->fetchALL(PDO::FETCH_OBJ);
          
          return    $resultado;
        }catch (\Exception $e) {}
    }
    
    function getOnePerson($id){
        try {
            // $this->peticion->query("SET NAMES 'utf8'");
            $h = $this->request->prepare("SELECT * FROM tbl_personas WHERE ID_PERSONA=:ID_PERSONA");
            $h->bindParam(':ID_PERSONA', $id, PDO::PARAM_INT);
            $h->execute();
          // $c=$h->rowCount();
          $resultado = $h->fetchALL(PDO::FETCH_OBJ);
    
          return    $resultado;
         }catch (\Exception $e) {}
      }

      
    function createPerson($user) {
        try {
          $query = $this->request->prepare("INSERT INTO tbl_personas VALUES(NULL, :DNI, :NOMBRE, :FECNAC, :DIR, :TFNO)");
          $query->bindParam(':DNI', $user['DNI'], PDO::PARAM_STR);
          $query->bindParam(':NOMBRE', $user['NOMBRE'], PDO::PARAM_STR);
          $query->bindParam(':FECNAC', $user['FECNAC'], PDO::PARAM_STR);
          $query->bindParam(':DIR', $user['DIR'], PDO::PARAM_STR);
          $query->bindParam(':TFNO', $user['TFNO'], PDO::PARAM_INT);
          // $query->execute();
          $response = $query->execute();
          // $response = $query->fetch(PDO::FETCH_OBJ);
          return $response;
        } catch (\Throwable $th) {
          //throw $th;
        }
      }

      function updatePerson($data) {
        try {
          $query = $this->request->prepare("UPDATE tbl_personas SET DNI=:DNI, NOMBRE=:NOMBRE, FECNAC=:FECNAC, DIR=:DIR, TFNO=:TFNO WHERE ID_PERSONA=:ID_PERSONA");
          $query->bindParam(':ID_PERSONA', $data['ID_PERSONA'], PDO::PARAM_INT);
          $query->bindParam(':DNI', $data['DNI'], PDO::PARAM_STR);
          $query->bindParam(':NOMBRE', $data['NOMBRE'], PDO::PARAM_STR);
          $query->bindParam(':FECNAC', $data['FECNAC'], PDO::PARAM_STR);
          $query->bindParam(':DIR', $data['DIR'], PDO::PARAM_STR);
          $query->bindParam(':TFNO', $data['TFNO'], PDO::PARAM_INT);
          $query->execute();
           
          $response = $query->fetchALL(PDO::FETCH_OBJ);
          return $response;
        } catch (\Throwable $th) {
          //throw $th;
        }
      }

      function deletePerson($id) {
        try {
          $query = $this->request->prepare("DELETE FROM tbl_personas WHERE ID_PERSONA=:ID_PERSONA");
          $query->bindParam(':ID_PERSONA', $id, PDO::PARAM_INT);
          $query->execute();
           
          $response = $query->fetchALL(PDO::FETCH_OBJ);
          return $response;
        } catch (\Throwable $th) {
          //throw $th;
        }
      }
  
}