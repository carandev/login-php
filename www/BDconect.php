<?php
// DB CREDENCIALES DE USUARIO.
define('DB_HOST','db');
define('DB_USER','root');
define('DB_PASS','test');
define('DB_NAME','db_usuarios');
// Ahora, establecemos la conexión.
try
{
  // Ejecutamos las variables y aplicamos UTF8
  $connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
  exit("Error: " . $e->getMessage());
}
?>

