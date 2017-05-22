<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">
</head>
<body>
	<div class="container">
	<br><br><br>
		<div class="row">
			<div class="col-md-offset-4 col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 style="margin: 0;" align="center">Login to eSPeKa</h2>
					</div>
					<div class="panel-body">
						<?php
							if ($this->session->has_userdata('status')) {
								echo $this->session->flashdata('status');
							}
						?>
						<form action="<?php echo site_url('login/auth'); ?>" method="post" accept-charset="utf-8">
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus="">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group" align="center">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>