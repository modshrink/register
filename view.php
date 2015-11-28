<?php
require_once( 'functions.php' );

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
//$rows = mysql_num_rows($result);
//$salt = mysql_fetch_array( $result );
echo $salt['salt'];

if ( !$db_selected ){
	die( 'データベース選択失敗です。' . mysql_error() );
}

$close_flag = mysql_close($link);

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

<h1> p------- m------ </h1>
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


	<form class="form-horizontal" method="POST" action="">
		<div class="form-group">
			<label class="col-sm-2" for="pm-label">label</label>
			<div class="col-sm-10">
				<input id="pm-label" class="form-control" type="text" name="label" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="pm-user">user</label>
			<div class="col-sm-10">
				<input id="pm-user" class="form-control" type="text" name="label" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="pm-password">password</label>
			<div class="col-sm-10">
				<input id="pm-password" class="form-control" type="text" name="label" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="pm-url">url</label>
			<div class="col-sm-10">
				<input id="pm-url" class="form-control" type="text" name="label" value="" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2" for="pm-cateogry">category</label>
			<div class="col-sm-10">
				<select id="pm-category" class="form-control" name="category">
					<option name="finance">finance</option>
					<option name="service">service</option>
					<option name="login">login</option>
					<option name="product">product</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2">note:</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="note" rows=5"></textarea>
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
