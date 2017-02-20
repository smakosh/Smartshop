<?php
session_start();

if (!isset($_SESSION['logged_in']) && !isset($_SESSION['item'])) {
    header('Location: sign');
}

elseif($_SESSION['item'] < 1){
  header('Location: index');
}
else {
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
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container checkout">
    <div class="card pay">
      <form method="post" action="final">
        <div class="row">

            <div class="input-field col s6">
              <i class="material-icons prefix">email</i>
              <input id="icon_prefix" type="text" name="email" value='<?= $email_sess; ?>' class="validate" required>
              <label for="icon_prefix">Email</label>
            </div>

            <div class="input-field col s6">
              <select class="icons" name="country" value="<?= $country_sess; ?>">
          <option value=""  disabled selected>Choose your country</option>
          <option value="Morocco">Morocco</option>
          <option value="Egypt">Egypt</option>
          <option value="Algeria">Algeria</option>
        </select>
        <label>Country</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">account_circle</i>
              <input id="icon_prefix" type="text" name="firstname" value='<?= $firstname_sess; ?>' class="validate" required>
              <label for="icon_prefix">First Name</label>
            </div>

            <div class="input-field col s6">
              <i class="material-icons prefix">perm_identity</i>
              <input id="icon_prefix" type="text" name="lastname" value='<?= $lastname_sess; ?>' class="validate" required>
              <label for="icon_prefix">Last Name</label>
            </div>


            <div class="input-field col s6">
              <i class="material-icons prefix">business</i>
              <input id="icon_prefix" type="text" value='<?= $city_sess; ?>' name="city" class="validate" required>
              <label for="icon_prefix">City</label>
            </div>

            <div class="input-field col s6 meh">
              <i class="material-icons prefix">location_on</i>
              <input id="icon_prefix" type="text" value='<?= $address_sess; ?>' name="address" class="validate" required>
              <label for="icon_prefix">Address</label>
            </div>

                <div class="center-align">
                    <button type="submit" id="confirmed" name="pay" class="btn meh button-rounded waves-effect waves-light ">Pay</button>
                </div>
          </div>
      </form>
    </div>
</div>

 <?php require 'includes/footer.php'; ?>
