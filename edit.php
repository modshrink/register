<?php
require_once( dirname(__FILE__) . '/core/DB.class.php' );
$DB = new DB();

$data_id = esc_html( $_GET['id'] );

$alert = $DB->db_connect_check_message();
$alert .= ssl_message();

if( $data_id ) {
	// 編集モード
	$input_array = array();
	foreach( input_data_list() as $input ) {
		$input_array[$input] = esc_html( $_POST[$input] );
	}

	if( $_POST['submit'] ) {
		$DB->update_data( $data_id, $input_array );
	}
} else {
	// 新規作成モード
	$input_array = array();
	foreach( input_data_list() as $input ) {
		$input_array[$input] = esc_html( $_POST[$input] );
	}

	if( $_POST['submit'] ) {
		$DB->insert_data( $input_array );
	}
}

$content = file_get_contents( dirname(__FILE__) . '/tpl/edit.tpl' );
//$contents = str_replace( '<%CONTENTS%>', $alert, $content );

$tag_key = array();
$tag_value = array();

foreach ( $DB->get_register_data_array( $data_id ) as $key => $value ) {
	$tag_key[] = '<%' . $key . '%>';
	$tag_value[] = $value;
}

//var_dump( $tag_key);
//var_dump( $tag_value);

$contents .= str_replace( $tag_key, $tag_value, $content );

echo $contents;
