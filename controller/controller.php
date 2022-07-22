  
<?php
require_once('model/model.php');
/**
 *
 */
class Controlador
{

    function __construct()
    {
      $this->o=new Model();
    }

    function fourzerofour(){
        include_once('views/fourzerofour.php');
    }

    function login(){
        
        include_once('views/layouts/head.html');
        include_once('views/layouts/navbar.html');
        include_once('views/login.php');
        include_once('views/layouts/foot.html');

        if(isset($_SESSION['notify']) && $_SESSION['notify']=='campos'){
            $_SESSION['notify']='';
            echo "<script language='javascript'>";
            echo "swal.fire({
              title: 'Error',
              text: 'Digite todos los campos',
              icon: 'error',
              confirmButtonText: 'Continuar',
              confirmButtonColor: '#f27474'
            });";
            echo "</script>";
          }
          if(isset($_SESSION['notify']) && $_SESSION['notify']=='datos'){
            $_SESSION['notify']='';
            echo "<script language='javascript'>";
            echo "swal.fire({
              title: 'Error',
              text: 'Datos incorrectos',
              icon: 'error',
              confirmButtonText: 'Continuar',
              confirmButtonColor: '#f27474'
            });";
            echo "</script>";
          }
    }

    function verifyUser(){

        if (isset($_POST['document']) && isset($_POST['password'])) {
          $document = $_POST['document'];
          $password = str_replace(" ", "", $_POST['password']);
  
          if (empty($document) || empty($password)) {
            $_SESSION['notify']='campos';
            header('Location: ?m=login');
          }else{
  
            $user = [
              "document" => $document,
              "password" => $password
            ];
            $response = $this->o->findUser($user);
            if ($response) {
              $_SESSION['userLoged']=$response;
              header("location:?m=home");
            }else{
              $_SESSION['notify']='datos';
              header("location:?m=login");
            }
          }
        }else{
          header("location:?m=login");
        }
      }

      function home(){
        if (isset($_SESSION['userLoged'])) {

        $personas = $this->o->getPersons();
          include_once('views/layouts/head.html');
          include_once('views/layouts/navbar.html');
        //   echo "<pre>";
        //   print_r($personas);
        //   echo "</pre>";
          include_once('views/home.php');
          include_once('views/layouts/foot.html');


          if(isset($_SESSION['notify']) && $_SESSION['notify']=='campos'){
            $_SESSION['notify']='';
            echo "<script language='javascript'>";
            echo "swal.fire({
              title: 'Error',
              text: 'Digite todos los campos',
              icon: 'error',
              confirmButtonText: 'Continuar',
              confirmButtonColor: '#f27474'
            });";
            echo "</script>";
          }
          if(isset($_SESSION['notify']) && $_SESSION['notify']=='202'){
            $_SESSION['notify']='';
            echo "<script language='javascript'>";
            echo "swal.fire({
              title: 'Genial',
              text: 'Se guardaron los datos correctamente',
              icon: 'success',
              confirmButtonText: 'Continuar',
              confirmButtonColor: '#f27474'
            });";
            echo "</script>";
          }
          if(isset($_SESSION['notify']) && $_SESSION['notify']=='deleted'){
            $_SESSION['notify']='';
            echo "<script language='javascript'>";
            echo "swal.fire({
              title: 'Genial',
              text: 'Se eliminó el registro correctamente',
              icon: 'success',
              confirmButtonText: 'Continuar',
              confirmButtonColor: '#f27474'
            });";
            echo "</script>";
          }
          if(isset($_SESSION['notify']) && $_SESSION['notify']=='updated'){
            $_SESSION['notify']='';
            echo "<script language='javascript'>";
            echo "swal.fire({
              title: 'Genial',
              text: 'Se actualizo el registro correctamente',
              icon: 'success',
              confirmButtonText: 'Continuar',
              confirmButtonColor: '#f27474'
            });";
            echo "</script>";
          }
        } else {
          header("location:?m=instituto");
        }
        
      }

        
    
      function createPerson(){
          if (isset($_SESSION['userLoged'])) {
              $data = $_POST;
              foreach ($data as $d) {
                  if (empty($d)) {
                      $_SESSION['notify']='campos';
                    }
            }
            
            if ($_SESSION['notify']=='') {
                $response = $this->o->createPerson($data);
                if ($response) {
                    $_SESSION['notify']='202';
                    header("location:?m=home");
                }
                // echo "<pre>";
                // print_r($response);
                // echo "</pre>";
            } else {
                header("location:?m=home");
            }
        } else {
            header("location:?m=login");
        }
        
    }

      function getPhones(){
          if (isset($_SESSION['userLoged'])) {
              $response = $this->o->getPhones();
              echo json_encode($response);
              
            } else {
                header("location:?m=login");
            }
            
        }

      function deletePerson(){
          if (isset($_SESSION['userLoged'])) {
              $id = $_POST['ID_PERSONA'];
              $response = $this->o->deletePerson($id);
              $_SESSION['notify']='deleted';
              
              header("location:?m=home");
              // echo "<pre>";
              // print_r($response);
              // echo "</pre>";
            } else {
                header("location:?m=login");
            }
            
        }
        
        function editarPersona(){
            if (isset($_SESSION['userLoged'])) {
                $id = $_POST['ID_PERSONA'];
                $persona = $this->o->getOnePerson($id);
                include_once('views/layouts/head.html');
            include_once('views/layouts/navbar.html');
            include_once('views/editarPersona.php');
            include_once('views/layouts/foot.html');
            //   $id = $_POST['ID_PERSONA'];
            //   $response = $this->o->deletePerson($id);
            //   $_SESSION['notify']='deleted';
                    
            //   header("location:?m=home");
        } else {
            header("location:?m=login");
        }
        
    }
    
    function updatePerson(){
        if (isset($_SESSION['userLoged'])) {
            $data = $_POST;
            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";
        $response = $this->o->updatePerson($data);
        $_SESSION['notify']='updated';
        header("location:?m=home");
      } else {
        header("location:?m=login");
      }
    }

    function logout(){
      if (isset($_SESSION['userLoged'])) {
        // include_once('views/layouts/head.html');
        // include_once('views/layouts/navbarInstituto.html');
        // include_once('views/public/cpanel.php');
        // include_once('views/layouts/foot.html');
        session_destroy();
        header("location:?m=login");
      } else {
        header("location:?m=login");
      }
  }

// end      
}