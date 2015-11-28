<?php
require_once( 'functions.php' );

// DB接続
$link = mysql_connect( DB_HOST, DB_USER, DB_PASSWORD );
if ( !$link ) {
    die( 'Database connect failed.' . mysql_error() );
}

$mes_db_connect_success = '<p>Database connect success.</p>';

$db_selected = mysql_select_db( 'pm', $link );

$mes_db_select_success = '<p>Database select success.</p>';

// sql query
$sql = "SELECT * FROM options";
$result = mysql_query($sql, $link) or die("クエリの送信に失敗しました。<br />SQL:".$sql);
$column = mysql_fetch_array( $result );
$salt = $column['salt'];
$db_user = $column['user'];
$db_password = $column['password'];
$login_flag = false;

if( !empty( $_POST['user'] ) && !empty( $_POST['password'] ) ) {
	//パスワードはハッシュ化する
	$input_user = $_POST['user'];
	$input_password = $_POST['password'];
	$password_hash = md5( $input_password . $salt );
	if( ( $db_user === $input_user ) && ( $db_password === $password_hash ) ) $login_flag = true;
}

if( $login_flag ) {
	header( "Location: view.php" );
}

if ( !$db_selected ){
	die( 'データベース選択失敗です。' . mysql_error() );
}

//$close_flag = mysql_close($link);

if ($close_flag){
	$mes_db_closed = '<p>Database closed.</p>';
}

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
<?php if( $mes_db_connect_success ) : ?>
<div role="alert" class="alert alert-success">
	<strong>DB</strong> <?php echo $mes_db_connect_success; ?>
</div>
<?php endif; ?>
<?php if( $mes_db_select_success ) : ?>
<div role="alert" class="alert alert-success">
	<strong>DB</strong> <?php echo $mes_db_select_success; ?>
</div>
<?php endif; ?>
<?php if( $mes_db_closed ) : ?>
<div role="alert" class="alert alert-warning">
	<strong>DB</strong> <?php echo $mes_db_closed; ?>
</div>
<?php endif; ?>
<?php if( is_ssl() ) : ?>
<div role="alert" class="alert alert-success">
	<strong>SSL</strong><p>SSL connection.</p>
</div>
<?php else : ?>
<div role="alert" class="alert alert-danger">
	<strong>SSL</strong><p>No SSL connection.</p>
</div>
<?php endif; ?>

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
