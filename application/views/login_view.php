<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
<div class="container" style="padding-top: 150px;">
      <div class="row justify-content-center mt-5">
        <div class="col-4 text-center">
          <h2 class="text-center" >Inicio de sesión</h2>
          <form action="<?php echo site_url('user_controller/login');?>" method="POST">
              <input type="text" name="username" class="form-control mt-4 mb-4" placeholder="Usuario">
              <input type="password" name="password" class="form-control mb-4" placeholder="Clave">            
              <input class="btn btn-dark" type="submit" value="Iniciar Sesión">            
          </form>
        </div>
		<?php
			if ($this->session->flashdata('error')) {
				?>
				<div class="alert alert-danger text-center" style="margin-top:20px;">
					<?php echo $this->session->flashdata('error'); ?>
				</div>
				<?php
			}
		?>
      </div>
    </div>
</body>
</html>