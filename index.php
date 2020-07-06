<?php
require_once 'autoload.php';
if (session_status() == PHP_SESSION_NONE) {
	session_start();
	if(!isset($_SESSION['token']) || empty($_SESSION['token'])){
		$length = 32;
		$_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length); 
	}
	$hash = $_SESSION['token'];
 }
 if(User::is_loggedin() === true)
{
	// daca este logat fac redirect
	User::redirect('afisare_carti.php');
}
 ?>

<!DOCTYPE html>
<html lang="en">
<?php include ('layout/head.php');?>
<body>
    <div class="container py-4">
<?php include('layout/meniu.php');?>
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 600px;">
			<h4 class="card-title mt-3 text-center">LOGIN MyApp - Carti</h4>
				<form  method="post" action="<?php echo $base;?>post_login.php" data-toggle="validator" novalidate="true">
					<?php if(isset($_SESSION['errors_msg']) && !empty($_SESSION['errors_msg'])):?> 
					<div class="alert alert-danger display-error">
						<?php echo $_SESSION['errors_msg'];?>
					 </div>
					<?php endif;?>
					<div class="form-group">
						<label for="email" class=" control-label">Email </label>
						<div >
						  <input type="email" name="email"  class="form-control" id="email" placeholder="Adresa de email" required/>
						</div>
					</div>
		 
					<div class="form-group">
						<label for="parola" class=" control-label">Parola</label>
						<div>
						  <input type="password" name="parola"  class="form-control" id="parola" required/>
						</div>
					</div>
					<input type="hidden" value="<?php echo $hash;?>" name="hash">
					<input id="submit" type="submit" class="btn btn-primary" value="Login" />
					</form>
            </article>
        </div>
        <!-- card.// -->
        <?php include('layout/footer.php');?>
    </div>
    <!--container end.//-->
</body>
</html>