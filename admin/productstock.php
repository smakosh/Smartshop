<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

$category = $_GET['id'];

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Dashboard</a>
            <a href="products" class="breadcrumb">Stock</a>
            <a href="productstock" class="breadcrumb">Products</a>
          </div>
        </div>
      </nav>
    </div>
   </div>
   <div class="container stocki">
       <div class="row">
           <?php
           include '../db.php';
            // get stock
            $query = "SELECT * FROM product WHERE id_category = '$category'";
            $result = $connection->query($query);
            if ($result->num_rows > 0) {
              while($rows = $result->fetch_assoc()) {
               $id_product = $rows['id'];
               $name = $rows['name'];
               $thumbnail = $rows['thumbnail'];
               $price = $rows['price'];

           ?>
           <div class="col s12 m4">
             <div class="card hoverable animated slideInUp wow">
               <div class="card-image">
                     <img src="../products/<?= $thumbnail; ?>">
                   <span class="card-title grey-text"><?= $name; ?></span>
                 </div>
                 <div class="card-content">
                      <h5 class="white-text">$ <?= $price; ?></h5>
                      <a class="blue-text" href="deleteproduct.php?id=<?= $id_product;?>">Delete</a>
                 </div>
             </div>
           </div>

         <?php }} ?>
       </div>
   </div>
  <?php require 'includes/footer.php'; ?>
