<?php
require_once( dirname(__FILE__) . '/../config.php' );
require_once( dirname(__FILE__) . '/functions.php' );

class DB {
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

	/* テーブルの作成 */

	public function create_table( $table_name ) {
		$sql = "CREATE TABLE $table_name (
			id int AUTO_INCREMENT NOT NULL,
			label text NOT NULL,
			user text,
			password text,
			note text,
			url text,
			created timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
			modified timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
			category text,
			license_key text,
			card_name text,
			card_type text,
			card_number int(16),
			card_security_code int(3),
			card_expiry_date date,
			PRIMARY KEY ( id ) )";
		$request = $this->mysqli->query( $sql );
		if( $request ) :
$html = <<<EOM
<div role="alert" class="alert alert-success">
	<strong>DB</strong> <p>Create $table_name table success.</p>
</div>
EOM;
		else :
$html = <<<EOM
<div role="alert" class="alert alert-danger">
	<strong>DB</strong> <p>Table $table_name not created.</p>
</div>
EOM;
		endif;
		return $html;
	}

	/* データの挿入 */
	public function insert_data( $array ) {
		// SQLに流し込むデータを整形
		foreach( $array as $key => $value ) {
			$col_name .= $key . ",";
			$col_value .= "'" . $value . "',";
		}
		// 最後のカンマを抜く
		$col_name = mb_substr( $col_name, 0, ( mb_strlen( $col_name ) -1) );
		$col_value = mb_substr( $col_value, 0, ( mb_strlen( $col_value ) -1) );

		// SQL
		$this->mysqli->query( "INSERT INTO data ( $col_name, created ) VALUES ( $col_value, NULL )" );
	}

	/* データの更新 */
	public function update_data( $id, $array ) {
		// SQLに流し込むデータを整形
		foreach( $array as $key => $value ) {
			$col_data .= $key . " = '" . $value . "',";
		}
		// 最後のカンマを抜く
		$col_data = mb_substr( $col_data, 0, ( mb_strlen( $col_data ) -1) );

		// SQL
		$this->mysqli->query( "UPDATE data SET $col_data WHERE id = $id" );
	}

	/* 保存されたデータを取得 */
	public function get_register_data( $id ) {
		$result = $this->mysqli->query( "SELECT * FROM data WHERE id = $id" );

		$html = <<<EOM
<table class="table table-condensed">
	<tbody>
EOM;
		while( $row = $result->fetch_assoc() ) {
			foreach( output_data_list() as $input ) {
				if( $row[$input] ) {
					$html .= '<tr>';
					$html .= '<th class="col-md-3">' . $input . '</th>';
					$html .= '<td class="col-md-9">' . $row[$input] . '</td>';
					$html .= '</tr>';
				}
			}
		}
		$html .= <<<EOM
	</tbody>
</table>
EOM;
		return $html;
	}

	/* 保存されたデータを取得 */
	public function get_register_data_array( $id ) {
		$result = $this->mysqli->query( "SELECT * FROM data WHERE id = $id" );

		$array = array();
		while( $row = $result->fetch_assoc() ) {
			foreach( output_data_list() as $input ) {
				if( $row[$input] ) {
					$array[$input] = $row[$input];
				}
			}
		}
		return $array;
	}

	/* DBに格納されたユーザオプションの値を取得 */
	private function get_user_data( $key ) {
		$result = $this->mysqli->query( "SELECT * FROM options" );
		$row = $result->fetch_assoc();
		return $row[$key];
	}

	public function login_check( $user, $password ) {
		$user = $_POST['user'];
		$password = $_POST['password'];
		$password_hash = md5( $password . $this->get_user_data( 'salt' ) );
		if( ( $this->get_user_data( 'user' ) === $user ) && ( $this->get_user_data( 'password' ) === $password_hash ) ) return true;
		return false;
	}

	public function login_message() {
		if( $this->login_check( $_POST['user'], $_POST['password'] ) ) :
$html = <<<EOM
<div role="alert" class="alert alert-success">
	<strong>LOGIN</strong> <p>success.</p>
</div>
EOM;
		else :
$html = <<<EOM
<div role="alert" class="alert alert-danger">
	<strong>LOGIN</strong> <p>error.</p>
</div>
EOM;
		endif;
		return $html;
	}
} // class Login end
