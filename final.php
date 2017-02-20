<?php
  session_start();

 if (!isset($_SESSION['logged_in']) && !isset($_POST['pay'])) {
     header('Location: sign');
 }

 if (isset($_POST['pay'])) {

    include 'db.php';

    $querycmd ="SELECT product.id,
                       product.name as 'product',
                       product.price as 'price',

                       command.id as 'idcmd',
                       command.id_produit,
                       command.quantity as 'quantity',
                       command.statut,
                       command.id_user as 'iduser',

                       users.id

                       FROM product, command, users
                       WHERE product.id = command.id_produit AND users.id = command.id_user
                       AND command.id_user = '{$_SESSION['id']}' AND command.statut = 'ordered'";
    $resultcmd = $connection->query($querycmd);
    if($resultcmd->num_rows > 0){
      while ($rowcmd = $resultcmd->fetch_assoc()) {
           $productcmd = $rowcmd['product'];
           $quantitycmd = $rowcmd['quantity'];
           $pricecmd = $rowcmd['price'];
           $idcmd = $rowcmd['idcmd'];
           $firstnamecmd = $_POST['firstname'];
           $lastnamecmd = $_POST['lastname'];
           $countrycmd = $_POST['country'];
           $citycmd = $_POST['city'];
           $addresscmd = $_POST['address'];

           $idusercmd = $rowcmd['iduser'];


    $price = $pricecmd * $quantitycmd;
    $fullname = $firstnamecmd . " " . $lastnamecmd ;

    $query_details = "INSERT INTO details_command(product,
                                                  quantity,
                                                  price,
                                                  id_command,
                                                  id_user,
                                                  user,
                                                  address,
                                                  country,
                                                  city,
                                                  statut) VALUES('$productcmd',
                                                               '$quantitycmd',
                                                               '$price',
                                                               '$idcmd',
                                                               '$idusercmd',
                                                               '$fullname',
                                                               '$addresscmd',
                                                               '$countrycmd',
                                                               '$citycmd',
                                                               'ready')";
    $resultdetails = $connection->query($query_details);

    $querypay = "UPDATE command SET statut = 'paid' WHERE id_user = '{$_SESSION['id']}' AND statut = 'ordered'";
    $resultpay = mysqli_query($connection, $querypay);
  }
}
    unset($_SESSION["item"]);

   $nav ='includes/navconnected.php';
   $idsess = $_SESSION['id'];

   $email_sess = $_SESSION['email'];
   $country_sess = $_SESSION['country'];
   $firstname_sess = $_SESSION['firstname'];
   $lastname_sess = $_SESSION['lastname'];
   $city_sess = $_SESSION['city'];
   $address_sess = $_SESSION['address'];
 }

  require 'includes/header.php';
  require $nav;?>
  <div class="container-fluid product-page">
    <div class="container current-page">
       <nav>
         <div class="nav-wrapper">
           <div class="col s12">
             <a href="index" class="breadcrumb">Home</a>
             <a href="cart" class="breadcrumb">Cart</a>
             <a href="checkout" class="breadcrumb">Checkout</a>
             <a href="final" class="breadcrumb">Thank you</a>
           </div>
         </div>
       </nav>
     </div>
    </div>

<div class="container thanks">
  <div class="row">
    <div class="col s12 m3">

    </div>

  <div class="col s12 m6">
  <div class="card center-align">
     <div class="card-image">
       <img src="src/img/thanks.png" class="responsive-img" alt="">
     </div>
     <div class="card-content center-align">
       <h5>Thank you for your purchase</h5>
       <p>Your order is on its way Dear : <h5 class="green-text"><?php echo"$firstname_sess". " " . "$lastname_sess";  ?></h5></p>
     </div>
   </div>

   <div class="center-align">
     <a href="details.php" class="button-rounded blue btn waves-effects waves-light">Details</a>
     <a href="index" class="button-rounded btn waves-effects waves-light">Home</a>
   </div>
  </div>
  <div class="col s12 m3">

  </div>
 </div>
</div>

    <?php require 'includes/footer.php'; ?>
