<?php
require_once( dirname(__FILE__) . '/core/edit.class.php' );

$edit = New Edit();

$edit->register();

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
			<label class="col-sm-2" for="pm-url">url</label>
			<div class="col-sm-10">
				<input id="pm-url" class="form-control" type="text" name="url" value="" />
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
				<textarea class="form-control" name="note" rows="5"></textarea>
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
