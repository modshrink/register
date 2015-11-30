<?php
require_once( '../config.php' );
require_once( 'functions.php' );

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
	
	/* DBとの接続を確認 */
	public function db_connect_check() {
		if ( $this->mysqli->connect_error ) return false;
		return true;
	}

	/* DBとの接続状態によるメッセージ(Bootstrap3) */
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

	/* DBに格納されたSaltの値を取得 */
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
	<link href="../css/style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
    <li class="active"><a href="#">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#contact">Contact</a></li>
  </ul>
</div><!--/.nav-collapse -->
</div>
</nav>


<div class="container">
<?php $login->db_connect_check_message(); ?>
<?php ssl_message(); ?>
</div> <!-- .container -->
</body>
</head>
