<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    $nav ='includes/nav.php';
    if (!isset($_GET['search'])) {
      header('Location: index');
    }
    else {
      $word = $_GET['searched'];
    }
}
else {
  $nav ='includes/navconnected.php';
  $idsess = $_SESSION['id'];
  if (!isset($_GET['search'])) {
    header('Location: index');
  }
  else {
    $word = $_GET['searched'];
  }
}

 require 'includes/header.php';
 require $nav;?>

 <div class="container-fluid product-page" id="top">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="index" class="breadcrumb">Home</a>
            <a href="search" class="breadcrumb">Search</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container search-page">
     <div class="row">
       <?php

       include 'db.php';
       //get products

       //pages links
       $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
       $perpage = isset($_GET['per-page']) && $_GET['per-page'] <= 16 ? (int)$_GET['per-page'] : 16;

       $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

       $queryproduct = "SELECT SQL_CALC_FOUND_ROWS id, name, price, id_picture, thumbnail FROM product WHERE name LIKE '%{$word}%' ORDER BY id DESC LIMIT {$start}, 16";
       $result = $connection->query($queryproduct);

       //pages
        $total = $connection->query("SELECT FOUND_ROWS() as total")->fetch_assoc()['total'];
        $pages = ceil($total / $perpage);

         if ($result->num_rows > 0) {
         // output data of each row
         while($rowproduct = $result->fetch_assoc()) {
           $id_product = $rowproduct['id'];
           $name_product = $rowproduct['name'];
           $price_product = $rowproduct['price'];
           $id_pic = $rowproduct['id_picture'];
           $thumbnail_product = $rowproduct['thumbnail'];

         ?>

             <div class="col s12 m4">
               <div class="card hoverable animated slideInUp wow">
                 <div class="card-image">
                     <a href="product.php?id=<?= $id_product; ?>">
                       <img src="products/<?= $thumbnail_product; ?>"></a>
                     <span class="card-title blue-text"><?= $name_product; ?></span>
                     <a href="product.php?id=<?= $id_product; ?>" class="btn-floating halfway-fab waves-effect waves-light right"><i class="material-icons">add</i></a>
                   </div>
                   <div class="card-action">
                     <div class="container-fluid">
                       <h5 class="white-text"><?= $price_product; ?> $</h5>
                     </div>
                   </div>
               </div>
             </div>
           <?php }} else {
             echo "<div class='container center-align'>
                   <h4 class='black-text'>Item not found</h4>
                   </div>";
           }?>

           </div>

           <div class="center-align animated slideInUp wow">
             <ul class="pagination <?php if($total<15){echo "hide";} ?>">
             <li class="<?php if($page == 1){echo 'hide';} ?>"><a href="?page=<?php echo $page-1; ?>&per-page=15"><i class="material-icons">chevron_left</i></a></li>
             <?php for ($x=1; $x <= $pages; $x++) : $y = $x;?>


                 <li class="waves-effect pagina  <?php if($page === $x){echo 'active';} elseif($page <  ($x +1) OR $page > ($x +1)){echo'hide';} ?>"><a href="?page=<?php echo $x; ?>&per-page=15" ><?php echo $x; ?></a></li>



             <?php endfor; ?>
             <li class="<?php if($page == $y){echo 'hide';} ?>"><a href="?page=<?php echo $page+1; ?>&per-page=15"><i class="material-icons">chevron_right</i></a></li>
           </ul>
           </div>
   </div>

<?php require 'includes/footer.php'; ?>
