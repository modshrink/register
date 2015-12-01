<?php
require_once( dirname(__FILE__) . '/../config.php' );
require_once( dirname(__FILE__) . '/functions.php' );

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

	/* DBに格納されたユーザオプションの値を取得 */
	private function get_user_data( $key ) {
		$result = $this->mysqli->query( "SELECT * FROM options" );
		$row = $result->fetch_assoc();
		return $row[$key];
	}

	public function login( $user, $password ) {
		$user = $_POST['user'];
		$password = $_POST['password'];
		$password_hash = md5( $password . $this->get_user_data( 'salt' ) );
		if( ( $this->get_user_data( 'user' ) === $user ) && ( $this->get_user_data( 'password' ) === $password_hash ) ) return true;
		return false;
	}


} // class Login end
