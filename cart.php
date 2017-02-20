<?php
session_start();

if ($_SESSION['item'] < 1 OR !isset($_SESSION['logged_in'])) {
    header('Location: sign');
}

else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
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
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container scroll info">
     <table class="highlight">
        <thead>
          <tr>
              <th data-field="name">Item Name</th>
              <th data-field="category">Category</th>
              <th data-field="price">Price</th>
              <th data-field="quantity">Quantity</th>
              <th data-field="total">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
           include 'db.php';
          //get products
          $queryproduct = "SELECT product.name as 'name',
          product.id as 'id', product.price as 'price',
          category.name as 'category', command.id_user, command.statut,
          command.quantity as 'quantity'
FROM category, product, command
WHERE command.id_produit = product.id AND product.id_category = category.id AND command.statut = 'ordered'";
          $result1 = $connection->query($queryproduct);
          if ($result1->num_rows > 0) {
          // output data of each row
          while($rowproduct = $result1->fetch_assoc()) {
            $id_productdb = $rowproduct['id'];
            $name_product = $rowproduct['name'];
            $category_product = $rowproduct['category'];
            $quantity_product = $rowproduct['quantity'];
            $price_product = $rowproduct['price'];

            ?>
          <tr>
            <td><?= $name_product; ?></td>
            <td><?= $category_product; ?></td>
            <td><?= $price_product; ?></td>
            <td><?= $quantity_product; ?></td>
            <td><?= $price_product*$quantity_product; ?></td>
            <td><a href="deletecommand.php?id=<?= $id_productdb; ?>"><i class="material-icons red-text">close</i></a></td>
          </tr>
        <?php }}?>
        </tbody>
      </table>
      <div class="right-align">
        <a href="checkout"
        class='btn-large button-rounded waves-effect waves-light'>
          Check out <i class="material-icons right">payment</i></a>
      </div>
   </div>
   <?php
    require 'includes/secondfooter.php';
    require 'includes/footer.php'; ?>
