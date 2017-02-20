<?php
session_start();

if (!isset($_GET['id'])) {
    header('Location: index');
}

if (!isset($_SESSION['logged_in'])) {
  $nav = 'includes/nav.php';
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
}

$id_product =$_GET['id'];
 require 'includes/header.php';
 require $nav;?>

 <div class="container-fluid product-page" id="top">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Home</a>
            <a href="product.php?id=<? $id_product; ?>" class="breadcrumb">Product</a>
          </div>
        </div>
      </nav>
    </div>
   </div>


<div class="container-fluid product">
  <div class="container">
   <div class="row">
     <div class="col s12 m6">
        <div class="card">
          <div class="card-image">
            <?php

            include 'db.php';

            //get products
            $queryproduct = "SELECT id, name, price, description, id_picture, thumbnail
              FROM product WHERE id = '{$id_product}'";
            $result1 = $connection->query($queryproduct);
            if ($result1->num_rows > 0) {
            // output data of each row
            while($rowproduct = $result1->fetch_assoc()) {
              $id_productdb = $rowproduct['id'];
              $name_product = $rowproduct['name'];
              $price_product = $rowproduct['price'];
              $id_pic = $rowproduct['id_picture'];
              $description = $rowproduct['description'];
              $thumbnail_product = $rowproduct['thumbnail']; }}?>
            <img class="materialboxed" width="650" src="products/<?= $thumbnail_product; ?>" alt="">
          </div>
        </div>
       <div class="row">
         <?php

         //get categories
           $querypic = "SELECT picture, id_produit FROM pictures WHERE id_produit = '$id_pic'";
           $total = $connection->query($querypic);
           if ($total->num_rows > 0) {
           // output data of each row
           while($rowpic = $total->fetch_assoc()) {
             $pics = $rowpic['picture'];
          ?>
           <div class="col s12 m4">
             <div class="card hoverable">
               <div class="card-image">
                 <img class="materialboxed" width="650" src="productsimg/<?= $pics; ?>" alt="">
               </div>
             </div>
           </div>
         <?php }} ?>
       </div>
     </div>

     <div class="col s12 m6">
       <form method="post">
       <h2><?= $name_product; ?></h2>
       <div class="divider"></div>
       <div class="stuff">
        <h3 class="woow">Price</h3>
        <h5>$ <?= $price_product; ?></h5>
           <p><?= $description; ?></p>
          <div class="input-field col s12">
            <i class="material-icons prefix">shopping_basket</i>
            <input id="icon_prefix" type="number" name="quantity" min="1" class="validate" required>
            <label for="icon_prefix">Qantity</label>
          </div>

           <?php

            if (isset($_POST['buy'])) {

               if (!isset($_SESSION['logged_in'])) {
                 echo "<meta http-equiv='refresh' content='0;url=http://localhost/Smartshop/sign' />";
               }

               else {
              $quantity = $_POST['quantity'];

              //inserting into command
              include 'db.php';

              $querybuy = "INSERT INTO command(id_produit, quantity, statut, id_user)
              VALUES ('$id_productdb','$quantity','ordered', '$idsess')";

            if ($connection->query($querybuy) === TRUE) {
                     $_SESSION['item'] += 1;

                     echo "<meta http-equiv='refresh' content='0;url=product.php?id=$id_productdb' />";
                 } else {
                     echo "<h5 class='text-red'>Error: " . $querybuy . "</h5><br><br><br>" . $connection->error;
                 }
                 $connection->close();
                 }
                }

            ?>

       <div class="center-align">
           <button type="submit" name="buy" class="btn-large meh button-rounded waves-effect waves-light ">Add to Cart</button>
       </div>
       </div>
        </form>
     </div>
   </div>
  </div>
</div>
<?php
 require 'includes/secondfooter.php';
 require 'includes/footer.php'; ?>
