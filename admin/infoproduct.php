<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Dashboard</a>
              <a href="infoproduct" class="breadcrumb">Products</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container">
     <div class="row">
       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/add.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="addproduct">Add Product</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/stats.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="stats">See Stats</a>
           </div>
         </div>
       </div>

       <div class="col s12 m4">
         <div class="card">
           <div class="card-image">
             <img src="src/img/edit.png" alt="">
           </div>
           <div class="card-action">
             <a class="blue-text" href="editproduct">Commands</a>
           </div>
         </div>
       </div>
     </div>
   </div>


 <?php require 'includes/footer.php'; ?>
