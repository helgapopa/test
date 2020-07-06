<?php
if (!isset($_SESSION)) {
    session_start();
}
$length = 32;
if(!isset($_SESSION['token'])){
	$_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length); 
}
$hash = $_SESSION['token'];
require_once 'autoload.php';
$time = date('d-M-Y');
$log = new Logwriter('logs/log-' . $time . '.txt');
$user_ip = User::getUserIP();
$log->info ('Ip utilizator: '.$user_ip);
?>


<!DOCTYPE html>
<html lang="en">
<?php include ('layout/head.php');?>
<body>
    <div class="container py-4">
<?php include('layout/meniu.php');?>
        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 600px;">
			<h4 class="card-title mt-3 text-center">Inregistreaza Uusers -  MyApp - Carti</h4>
				<form  method="post" action="<?php echo $base;?>post_inregistrare.php" data-toggle="validator" novalidate="true">
<?php if(isset($_SESSION['errors_msg']) && !empty($_SESSION['errors_msg'])):?> 
					<div class="alert alert-danger display-error">
						<?php echo $_SESSION['errors_msg'];?>
					 </div>
<?php endif;?>
                     <div class="form-group">
						<label for="nume" class=" control-label">Nume </label>
						<div >
						  <input type="text" name="nume"  class="form-control" id="nume" placeholder="Nume" required/>
						</div>
                    </div>
                    <div class="form-group">
						<label for="prenume" class=" control-label">Prenume </label>
						<div >
						  <input type="text" name="prenume"  class="form-control" id="prenume" placeholder="Prenume" required/>
						</div>
					</div>
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
                    <div class="form-group">
						<label for="parola2" class=" control-label">Confirma Parola</label>
						<div>
						  <input type="password" name="parola2"  class="form-control" id="parola2" required/>
						</div>
					</div>
					<input type="hidden" name="hash" value="<?php echo $hash;?>">
					<input id="submit" type="submit" class="btn btn-primary" value="Inregistreaza-te" />
					</form>
            </article>
        </div>
        <!-- card.// -->
        <?php include('layout/footer.php');?>
    </div>
    <!--container end.//-->
</body>
</html>