<?php //resize_function//////////////////////////////////////////////////
function CreateThumbs($src, $dst, $width, $height, $crop=0){


  list($w, $h) = getimagesize($src);


  $type = strtolower(substr(strrchr($src,"."),1));

  if($type == 'jpeg') $type = 'jpg';
  switch($type){
  case 'bmp': $img = imagecreatefromwbmp($src); break;
  case 'gif': $img = imagecreatefromgif($src); break;
  case 'jpg': $img = imagecreatefromjpeg($src); break;
  case 'png': $img = imagecreatefrompng($src); break;
  default : return "Invalid Picture Type!";
  }

  // resize
  if($crop){
  if($w < $width or $h < $height) return "Picture is too small!";
  $ratio = max($width/$w, $height/$h);
  $h = $height / $ratio;
  $x = ($w - $width / $ratio) / 2;
  $w = $width / $ratio;
  }
  else{
  if($w < $width and $h < $height) return "Picture is too small!";
  $ratio = min($width/$w, $height/$h);
  $width = $w * $ratio;
  $height = $h * $ratio;
  $x = 0;
  }

   $new = imagecreatetruecolor($width, $height);
  if($type == "gif" or $type == "png"){
  imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
  imagealphablending($new, false);
  imagesavealpha($new, true);
  }

  imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

  switch($type){
  case 'bmp': imagewbmp($new, $dst); break;
  case 'gif': imagegif($new, $dst); break;
  case 'jpg': imagejpeg($new, $dst); break;
  case 'png': imagepng($new, $dst); break;
  }

  return true;

}
if (isset($_POST['signup'])) {

  $path = "users/";
  $file = $path . basename($_FILES["img"]["name"]);
  $uploadOk = 1;
  $type = pathinfo($file,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["img"]["tmp_name"]);
  if($check !== false) {
  $uploadOk = 1;
  } else {
  echo "<a class='btn-large red waves-effects light-effects'>File is not an image</a><br><br>";
  $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["img"]["size"] > 50000000) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, your picture is too large</a><br><br>";
  $uploadOk = 0;
  }

  // Allow certain file formats
  if($type != "png" && $type != "jpeg" && $type != "jpg" ) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, only JPEG, JPG, PNG pictures are allowed</a><br><br>";
  $uploadOk = 0;
  }

 else {
    $uploadOk = 1;
  }



  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, your file was not uploaded</a><br><br>";
  // if everything is ok, try to upload file
  } else {
  if (move_uploaded_file($_FILES["img"]["tmp_name"], $file)) {

  } else {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, there was an error uploading your picture</a>";
  }
  }

  $img_title=$_FILES["img"]["name"];

$img_path = "users/".$_FILES["img"]["name"];
//resize_function//////////////////////////////////////////////////
CreateThumbs($img_path, $img_path, 51, 51, 0);

  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $job = $_POST['job'];
  $statut = $_POST['statut'];
  $encryptedpass = md5($password);

include 'db.php';

  //get user
   $queryuser_db = "SELECT username FROM users WHERE username LIKE '$username'";
   $resultuser_db = $connection->query($queryuser_db);

  if ($resultuser_db->num_rows > 0) {
   echo "<div class='center-align'>
   <button class='btn red waves-effects waves-light'>$username does already exists</button><br><br>
   </div>";
die();
}





  //connecting & inserting data

  $query = "INSERT INTO users(email,
username,
password,
job,
statut,
img) VALUES ('
" . mysql_real_escape_string($email) . "',
'" . mysql_real_escape_string($username) . "',
'$encryptedpass','$job','$statut', '$img_title')";

if ($connection->query($query) === TRUE) {
         echo "<div class='center-align'>
         <button class='btn green waves-effects waves-light'>Welcome $username</button><br><br>
         </div>";

           header( 'Location: login');
     } else {
         echo "<button class='btn red btn-large waves-effects light-effects'>Error: " . $query . "</button><br><br><br>" . $connection->error;
     }

     $connection->close();

} ?>
