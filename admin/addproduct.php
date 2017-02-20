<?php

session_start();

if (!isset($_SESSION['id'])) {
header('Location: ../sign');
}
else {

error_reporting(0);

require 'includes/header.php';
require 'includes/navconnected.php'; }
?>

<div class="container-fluid product-page">
  <div class="container current-page">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="index" class="breadcrumb">Dashboard</a>
          <a href="infoproduct" class="breadcrumb">Managa Products</a>
          <a href="addproduct" class="breadcrumb">Add product</a>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="container addproduct">
  <div class="container">
    <div class="row">
        <?php
        include '../db.php';

        //get categories
          $querycategory = "SELECT id, name, icon  FROM category";
          $total = $connection->query($querycategory);
          if ($total->num_rows > 0) {
          // output data of each row
          while($rowcategory = $total->fetch_assoc()) {
            $id_category = $rowcategory['id'];
            $name_category = $rowcategory['name'];
            $icon_category = $rowcategory['icon'];

        ?>

        <div class="col s12 m4">
          <div class="card hoverable animated slideInUp wow">
            <div class="card-image">
              <a href="addp.php?id=<?= $id_category; ?>&category=<?= $name_category; ?>&icon=<?= $icon_category; ?>">
                <img src="src/img/<?= $icon_category; ?>.png" alt=""></a>
              <span class="card-title blue-text"><?= $name_category; ?></span>
            </div>
          </div>
        </div>

      <?php }} ?>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
