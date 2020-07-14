<?php
  require 'config/config.php';
  /*// Create connection

  $conn = new mysqli($servername, $username, $password,$basedatos);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
*/
  class Conexion extends Mysqli{
    public function __construct()
    {
      parent::__construct(HOST, USER_NAME,PASSWORD,BD);
      $this->set_charset('UTF8');
      $this->connect_error? die('No se puede acceder al Servidor'):'';
      //var_dump($this->get_charset()  );
    }  
  }
  $db = new Conexion();
?>