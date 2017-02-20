<?php
  session_start();

 if (!isset($_SESSION['logged_in'])) {
     header('Location: sign');
 }

else {
 $idsess = $_SESSION['id'];
}
 require 'includes/header.php';
 ?>

 <div class="container print">
   <table>
      <thead>
        <tr>
            <th data-field="name">Item Name</th>
            <th data-field="category">quantity</th>
            <th data-field="price">price</th>
            <th data-field="quantity">user</th>
            <th data-field="country">country</th>
            <th data-field="city">city</th>
            <th data-field="address">address</th>
        </tr>
      </thead>
      <tbody class="scroll">
        <?php
         include 'db.php';
        //get detailss
        $querydetails = "SELECT * FROM details_command WHERE id_user = '$idsess' AND statut ='ready'";
        $result = $connection->query($querydetails);
        if ($result->num_rows > 0) {
        // output data of each row
        while($rowdetails = $result->fetch_assoc()) {
          $id_details = $rowdetails['id'];
          $product_details = $rowdetails['product'];
          $quantity_details = $rowdetails['quantity'];
          $price_details = $rowdetails['price'];
          $user_details = $rowdetails['user'];
          $country_details = $rowdetails['country'];
          $city_details = $rowdetails['city'];
          $address_details = $rowdetails['address'];
          $idcmdd = $rowdetails['id_command'];

          ?>
        <tr>
          <td><?= $product_details; ?></td>
          <td><?= $quantity_details; ?></td>
          <td>$ <?= $price_details; ?></td>
          <td><?= $user_details; ?></td>
          <td><?= $country_details; ?></td>
          <td><?= $city_details; ?></td>
          <td><?= $address_details; ?></td>
        </tr>
      <?php }} ?>
      <div class="left-align">
        <?php

        $querycmd = "SELECT id FROM command WHERE id = '$idcmdd'";
        $getid = mysqli_query($connection, $querycmd);
        $rowcmd = mysqli_fetch_array($getid);
        $idcmd = $rowcmd['id'];

        ?>
        <h5>Invoice #<?= $idcmd; ?></h5>
      </div>
      </tbody>
    </table>
    <div class="right-align">
      <p>Thank you for trusting us © Smartshop Inc <?= date('Y'); ?></p>
    </div>

    <form method="post">
      <button type="submit" name="done" class="button-rounded waves-effect waves-light btn">Home</button>
      <!--<button type="submit" name="done2" class="blue waves-effect waves-light btn">
      save as pdf <i class="fa fa-print"></i></button>-->
      <?php

        if (isset($_POST['done'])) {



          $queryupdate = "UPDATE details_command SET statut = 'done' WHERE id_user = '$idsess' AND statut = 'ready'";
          $queryupdate = mysqli_query($connection, $queryupdate);

          echo "<meta http-equiv='refresh' content='0;url=index' />";
        }

       ?>
    </form>
 </div>

<?php require 'includes/footer.php'; ?>
