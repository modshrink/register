<html>
<head>
	<title><%SITE_TITLE%></title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex,nofollow">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Project name</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				<li class="active"><a href="/edit.php">New</a></li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

<div class="container">

<%CONTENTS%>

<form class="form-horizontal" method="POST" action="">
	<div class="form-group">
		<label class="col-sm-2" for="pm-label">Label</label>
		<div class="col-sm-10">
			<input id="pm-label" class="form-control" type="text" name="label" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-cateogry">Category</label>
		<div class="col-sm-10">
			<select id="pm-category" class="form-control" name="category">
				<option name="login">Login</option>
				<option name="license">License</option>
				<option name="card">Card</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-user">User</label>
		<div class="col-sm-10">
			<input id="pm-user" class="form-control" type="text" name="user" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-password">Password</label>
		<div class="col-sm-10">
			<input id="pm-password" class="form-control" type="text" name="password" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-url">URL</label>
		<div class="col-sm-10">
			<input id="pm-url" class="form-control" type="text" name="url" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-license">License Key</label>
		<div class="col-sm-10">
			<input id="pm-license_key" class="form-control" type="text" name="license_key" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-card_name">Card User Name</label>
		<div class="col-sm-10">
			<input id="pm-card_name" class="form-control" type="text" name="card_name" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-card_type">Card Type</label>
		<div class="col-sm-10">
			<select id="pm-card_type" class="form-control" name="card_type">
				<option name="visa">Visa</option>
				<option name="master_card">Master Card</option>
				<option name="american_express">Amarican Express</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-card_number">Card Number</label>
		<div class="col-sm-10">
			<input id="pm-card_number" class="form-control" type="text" name="card_number" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-card_security_code">Card Security Code</label>
		<div class="col-sm-10">
			<input id="pm-card_security_code" class="form-control" type="text" name="card_security_code" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2" for="pm-card_expiry_date">Card Expiry Date</label>
		<div class="col-sm-10">
			<input id="pm-card_expiry_date" class="form-control" type="text" name="card_expiry_date" value="" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2">Note</label>
		<div class="col-sm-10">
			<textarea class="form-control" name="note" rows="5"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</div>
	<input type="hidden" name="submit" value="1" />
</form>

</div> <!-- .container -->

</body>
</html>
