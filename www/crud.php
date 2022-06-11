<?php
header("Access-Control-Allow-Origin: *");

include "BDconect.php";
if($_SERVER["REQUEST_METHOD"] == "GET"){
  $sql = "SELECT * FROM users"; 

  $query = $connect -> prepare($sql); 
  $query -> execute(); 
  $results = $query -> fetchAll(PDO::FETCH_OBJ); 

  if($query -> rowCount() > 0) {
    echo json_encode($results);
  } else {
    $data['error'] = true;
    $data['message'] = 'Error in query';

    echo json_encode($data);
  }
} elseif ($_SERVER["REQUEST_METHOD"] == "DELETE") {
  $userData = json_decode(file_get_contents('php://input'), true);
  $sql = "DELETE FROM users WHERE id=:id";

  $query = $connect -> prepare($sql);

  $query -> bindParam(':id', $id, PDO::PARAM_INT);
  $id = trim($userData['id']);

  $query -> execute();
  if($sql->rowCount() <= 0){
    $data['error'] = true;
    $data['message'] = 'Error in query';

    echo json_encode($data);
  }
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT"){
  $userData = json_decode(file_get_contents('php://input'), true);
  $sql = "UPDATE users SET `username` = :username WHERE `id` = :id";

  $query = $connect -> prepare($sql);

  $query -> bindParam(':username', $username, PDO::PARAM_STR);
  $query -> bindParam(':id', $id, PDO::PARAM_INT);
  $id = $userData['id'];
  $username = trim($userData['username']);

  $query -> execute();

  if($query->rowCount() > 0){
    $data['error'] = true;
    $data['message'] = 'Error in query';

    echo json_encode($data);
  } else {
    $data['error'] = false; 

    echo json_encode($data);
  }
}


