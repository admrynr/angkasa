<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tutorial Codeiniter Dasar</title>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.css">
</head>
<body style="background-color: #222;">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default" style="margin-top: 10%;">
					<div class="panel-heading">
						<h1 align="center">Silahkan Login</h1>
					</div>
					<div class="panel-body" style="background-color: #ccc;">
						<form action="<?php echo base_url('C_tutorial/user_login') ?>" method="post" class="form-horizontal">
						<?php if ($error = $this->session->flashdata('pesan')): ?>
						<div class="form-group">
							<div class="col-md-12">
								<div class="alert alert-dismissible alert-danger">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <?php echo $error; ?>
								</div>
							</div>
						</div>
						<?php endif ?>
						
							<div class="form-group">
								<div class="col-md-12">
									<input class="form-control" type="text" name="username" value="<?php echo set_value('username') ?>" placeholder="Masukkan Username Anda">
								</div>
								<div class="col-md-12">
									<?php echo form_error('username','<span class="text-danger">','</span>') ?>
								</div>
								
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<input class="form-control" type="password" name="password" value="<?php echo set_value('password') ?>" placeholder="Masukkan Password Anda" >
								</div>
								<div class="col-md-12">
									<?php echo form_error('password','<span class="text-danger">','</span>') ?>
								</div>
								
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<input class="btn btn-primary btn-block" type="submit" value="Login">
								</div>
								
							</div>
							
						</form>
					</div>
		
				</div>
			</div>
		</div>
	</div>


	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>