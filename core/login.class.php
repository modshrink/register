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
		if( $this->db_connect_check() ) :
$html = <<<EOM
<div role="alert" class="alert alert-success">
	<strong>DB</strong> <p>connect success.</p>
</div>
EOM;
		else :
$html = <<<EOM
<div role="alert" class="alert alert-danger">
	<strong>DB</strong> <p>connect error.</p>
</div>
EOM;
		endif;

		return $html;
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
<?php
$alert = $login->db_connect_check_message();
$alert .= ssl_message();
?>

<?php
$contents = file_get_contents( '../tpl/index.tpl' );
$contents = str_replace( '<%CONTENTS%>', $alert, $contents );

echo $contents;


