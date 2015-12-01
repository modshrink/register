<?php
require_once( dirname(__FILE__) . '/core/login.class.php' );

$login = new Login();

$alert = $login->login_message();

$alert .= <<<EOM
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
EOM;

$contents = file_get_contents( dirname(__FILE__) . '/tpl/index.tpl' );
$contents = str_replace( '<%CONTENTS%>', $alert, $contents );

echo $contents;
