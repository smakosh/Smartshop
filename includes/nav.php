 <div class="navbar-fixed">
  <nav class="navblack">
    <div class="nav-wrapper nav-wrapper-2 container white">
    <ul class="left hide-on-med-and-down">
      <li><a href="index" class="brand"></a></li>
      <li><a href="index" class="dark-text">SmartShop</a></li>

    </ul>

    <ul class="center hide-on-large-only">
      <li><a href="index" class="dark-text">SmartShop</a></li>

    </ul>

    <ul  class="right hide-on-med-and-down">
        <li><a href="index" class="dark-text">Home</a></li>
      <li><a href="sign" class="waves-effect waves-light btn button-rounded">Sign In</a></li>
      <li><a href="cart" class="dark-text baskett"><i class="material-icons">shopping_cart</i>
        <span class="badge <?php if(!isset($_SESSION['item']) OR $_SESSION['item'] == 0) echo'hide'; ?>"><?= $_SESSION['item']; ?></span></a></li>
    </ul>
  </div>
  </nav>
</div>
