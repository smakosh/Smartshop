<?php


  $pathpic = "../productsimg/";
  $filepic = $pathpic . basename($_FILES["picture1"]["name"]);
  $uploadOki = 1;
  $typepic = pathinfo($filepic,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
  $check2 = getimagesize($_FILES["picture1"]["tmp_name"]);
  if($check2 !== false) {
  $uploadOki = 1;
  } else {
  echo "<a class='btn-large red waves-effects light-effects'>File is not an image</a><br><br>";
  $uploadOki = 0;
  }

  // Check file size
  if ($_FILES["picture1"]["size"] > 50000000) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, your picture is too large</a><br><br>";
  $uploadOki = 0;
  }

  // Allow certain file formats
  if($typepic != "png" && $typepic != "jpeg" && $typepic != "jpg" ) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, only JPEG, JPG, PNG pictures are allowed</a><br><br>";
  $uploadOki = 0;
  }

 else {
    $uploadOki = 1;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOki == 0) {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, your file was not uploaded</a><br><br>";
  // if everything is ok, try to upload file
  } else {
  if (move_uploaded_file($_FILES["picture1"]["tmp_name"], $filepic)) {

  } else {
  echo "<a class='btn-large red waves-effects light-effects'>Sorry, there was an error uploading your picture</a>";
  }
  }

  $img=$_FILES["picture1"]["name"];

$img_pathpic1 = "../productsimg/".$_FILES["picture1"]["name"];

// 3 pictures
CreateThumbs($img_pathpic1, $img_pathpic1, 602, 600, 1);

//pictues
$picture1 = $_FILES["picture1"]["name"];


//adding pictures
$querypic = "INSERT INTO pictures(picture, id_produit)
VALUES ('$picture1', '$idproduct')";
mysqli_query($connection, $querypic);


$pathpic2 = "../productsimg/";
$filepic2 = $pathpic2 . basename($_FILES["picture2"]["name"]);
$uploadOki2 = 1;
$typepic2 = pathinfo($filepic2,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
$check22 = getimagesize($_FILES["picture2"]["tmp_name"]);
if($check22 !== false) {
$uploadOki2 = 1;
} else {
echo "<a class='btn-large red waves-effects light-effects'>File is not an image</a><br><br>";
$uploadOki2 = 0;
}

// Check file size
if ($_FILES["picture2"]["size"] > 50000000) {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, your picture is too large</a><br><br>";
$uploadOki2 = 0;
}

// Allow certain file formats
if($typepic2 != "png" && $typepic2 != "jpeg" && $typepic2 != "jpg" ) {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, only JPEG, JPG, PNG pictures are allowed</a><br><br>";
$uploadOki2 = 0;
}

else {
  $uploadOki2 = 1;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOki2 == 0) {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, your file was not uploaded</a><br><br>";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["picture2"]["tmp_name"], $filepic2)) {

} else {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, there was an error uploading your picture</a>";
}
}

$img2=$_FILES["picture1"]["name"];

$img_pathpic2 = "../productsimg/".$_FILES["picture2"]["name"];

// 3 pictures
CreateThumbs($img_pathpic2, $img_pathpic2, 602, 600, 1);

//pictues
$picture2 = $_FILES["picture2"]["name"];


//adding pictures
$querypic = "INSERT INTO pictures(picture, id_produit)
VALUES ('$picture2', '$idproduct')";
mysqli_query($connection, $querypic);


$pathpic3 = "../productsimg/";
$filepic3 = $pathpic3 . basename($_FILES["picture3"]["name"]);
$uploadOki3 = 1;
$typepic3 = pathinfo($filepic3,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
$check23 = getimagesize($_FILES["picture3"]["tmp_name"]);
if($check23 !== false) {
$uploadOki3 = 1;
} else {
echo "<a class='btn-large red waves-effects light-effects'>File is not an image</a><br><br>";
$uploadOki3 = 0;
}

// Check file size
if ($_FILES["picture3"]["size"] > 50000000) {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, your picture is too large</a><br><br>";
$uploadOki3 = 0;
}

// Allow certain file formats
if($typepic3 != "png" && $typepic3 != "jpeg" && $typepic3 != "jpg" ) {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, only JPEG, JPG, PNG pictures are allowed</a><br><br>";
$uploadOki3 = 0;
}

else {
  $uploadOki3 = 1;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOki3 == 0) {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, your file was not uploaded</a><br><br>";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["picture3"]["tmp_name"], $filepic3)) {

} else {
echo "<a class='btn-large red waves-effects light-effects'>Sorry, there was an error uploading your picture</a>";
}
}

$img3=$_FILES["picture3"]["name"];

$img_pathpic3 = "../productsimg/".$_FILES["picture3"]["name"];

// 3 pictures
CreateThumbs($img_pathpic3, $img_pathpic3, 602, 600, 1);

//pictues
$picture3 = $_FILES["picture3"]["name"];


//adding pictures
$querypic = "INSERT INTO pictures(picture, id_produit)
VALUES ('$picture3', '$idproduct')";
mysqli_query($connection, $querypic);


 ?>
