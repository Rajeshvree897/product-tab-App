<?php 
session_start(); 
?>
<nav class="navbar navbar-expand-lg bg-secondary">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
          <?php if(isset($_SESSION['email'])){?>
        <form method="post">
          <button class="btn btn-outline-success logout-btn" style="margin-left: 743px; margin-top: 5px;" type="submit" name="logout_session">Logout</button>
      </form>
    <?php }else{?>
      <a class="nav-link " style="color: white; font-size: 16px; margin-left: 743px" href="admin_login.php">Login</a>
    <?php }?>
      </li>
    </ul>
  </div>
</nav>

<?php 
if(isset($_POST['logout_session'])){
   session_start();
    unset($_SESSION['email']);
     if(!isset($_SESSION['email'])){
      die("<script> top.location.href='admin_login.php'</script>");
  }         

}
?>
<style type="text/css">
  .logout-btn{
  position: absolute;
    top: 3px;
    right: 0;
    background: #fff;
    color: black;
}
</style>