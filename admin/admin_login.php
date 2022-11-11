<?php
session_start(); 
include 'admin_script.php';
//include 'admin_header.php';

if(isset($_SESSION['email'])){
    die("<script> top.location.href='super_admin_dashboard.php'</script>");
}else{
?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 col-md-12">
					<div class="wrapper">
						<div class="">
							<div class="d-flex align-items-stretch">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-12">Admin Login</h3>
									<div id="form-message-warning" class="mb-12"></div> 
				      		<div id="form-message-success" class="mb-12">
				            Your message was sent, thank you!
				      		</div>
									<form method="POST" id="" name="contactForm">
										<div class="row">
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="email" class="form-control" name="email" id="admin_email" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="password" class="form-control" name="password" id="admin_password" placeholder="password">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name="login" value="Login" class="btn btn-primary" id="sb_admin_login">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }
?>
<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>
</script>
<?php 
if(isset($_POST['login'])){
    session_start();
  	$email = trim($_POST["email"]);
   	$password = trim($_POST["password"]);   
    $admin_email = 'rajeshvree.karma@techinfini.com';
    $admin_pass = '1234567';
    if($admin_email == $email && $admin_pass == $password){
        # Set our session values
        $_SESSION['email'] = $email;
        die("<script> top.location.href='all_user_support_request.php'</script>");
    }else{
    	die('<script>alert("Worng Email & passowrd")</script>');
    }
}
?>