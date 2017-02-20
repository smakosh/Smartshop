<?php
session_start();

  include_once '../db.php';

if (isset($_GET['id'])) {
   $id=$_GET['id'];

   $query_delete = "DELETE FROM users WHERE id = '$id'";
   $result_delete = $connection->query($query_delete);

   $query_delete2 = "DELETE FROM command WHERE id_user = '$id'";
   $result_delete2 = $connection->query($query_delete2);

header('Location: ' . $_SERVER['HTTP_REFERER']);
}

else {
  header('Location: ../sign');
}
?>
