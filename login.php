<?php
require_once( dirname(__FILE__) . '/core/login.class.php' );

$login = new Login();

if( $login->login( $_POST['user'], $_POST['password'] ) ) :
	echo 'ログイン成功';
else :
	echo 'ログイン失敗';
endif;

//if( $login_flag ) {
//	header( "Location: view.php" );
//}

?>


<html>
<head>
	<title>pm</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">

<h1>a-----m------</h1>

	<form class="form-horizontal" method="POST" action="">
		<div class="form-group">
			<label class="col-sm-2" for="pm-user">user</label>
			<div class="col-sm-10">
				<input id="pm-user" class="form-control" type="text" name="user" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="pm-password">password</label>
			<div class="col-sm-10">
				<input id="pm-password" class="form-control" type="text" name="password" value="" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
				<label><input type="checkbox" name="remember"> Remember me</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
	</form>
</div> <!-- .container -->
</body>
</head>
