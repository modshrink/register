<?php

require_once( '../config.php' );

class Login {
	private $mysqli = null;

	function __construct() {
		$this->mysqli = new mysqli(
		DB_HOST,
		DB_USER,
		DB_PASSWORD,
		DB_NAME
		);
	}

	public function db_connect_check() {
		if ( $this->mysqli->connect_error ) return false;
		return true;
	}

	public function db_connect_check_message() {
		if( $this->db_connect_check() ) : ?>
		<div role="alert" class="alert alert-success">
			<strong>DB</strong> <p>connect success.</p>
		</div>
		<?php else : ?>
		<div role="alert" class="alert alert-danger">
			<strong>DB</strong> <p>connect error.</p>
		</div>
		<?php endif;
	}

	private function salt() {
		$result = $this->mysqli->query( "SELECT * FROM options" );
		$row = $result->fetch_assoc();
		return $row['salt'];
	}



} // class Login end

$login = new Login();
?>
<html>
<head>
	<title>pm</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container">
<?php $login->db_connect_check_message(); ?>
</div> <!-- .container -->
</body>
</head>
