<?php if (isset($_POST['login'])) {
$name = $_POST['name'];
$password=md5($_POST['pass']);
include 'db.php';
$name=mysqli_real_escape_string($connection, $name);
$query = "SELECT * FROM users WHERE username='{$name}' and password = '{$password}'";
$select_user_query = mysqli_query($connection, $query);
if (!$select_user_query) {
DIE("QUERY FAILED". mysqli_error($connection));
}
$row = mysqli_fetch_array($select_user_query);

$db_id = $row['id'];
$db_name = $row['username'];
$db_password = $row['password'];
$db_job = $row['job'];
if ($name !== $db_name && $password !== $db_password) {
echo "<div class='center-align meh'>
  <a class='btn btn-large  waves-effect gradient-minimalred
  lights-effect '>Wrong Info <i class='material-icons right'>close</i></a>
</div>";
}
elseif($db_job == 'admin'){
  $querystatut = "UPDATE users SET statut = 'online' WHERE id='$db_id'";
  $resultstatut = $connection->query($querystatut);

  $_SESSION['admin'] = $db_job;
  $_SESSION['id'] = $db_id;
  $_SESSION['user'] = $db_name;
  $_SESSION['logged_in']= 'True';
  header("Location: admin/index.php");
}
else{
  $querystatut = "UPDATE users SET statut = 'online' WHERE id='$db_id'";
  $resultstatut = $connection->query($querystatut);

$_SESSION['id'] = $db_id;
$_SESSION['user'] = $db_name;
$_SESSION['logged_in']= 'True';
header( "Location: index" );
}

} ?>
