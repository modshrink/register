<?php
require_once( dirname(__FILE__) . '/core/edit.class.php' );

$edit = new Edit();
$DB = new DB();

$alert = $DB->db_connect_check_message();
$alert .= ssl_message();


$label = esc_html( $_POST['label'] );
$user = esc_html( $_POST['user'] );
$password = esc_html( $_POST['password'] );
$note = esc_html( $_POST['note'] );
$url = esc_html( $_POST['url'] );
$category = esc_html( $_POST['category'] );
$license_key = esc_html( $_POST['license_key'] );
$card_name = esc_html( $_POST['card_name'] );
$card_type = esc_html( $_POST['card_type'] );
$card_number = esc_html( $_POST['card_number'] );
$card_security_code = esc_html( $_POST['card_security_code'] );
$card_expiry_date = esc_html( $_POST['card_expiry_date'] );

$input_array = array();
foreach( input_data_list() as $input ) {
	$input_array[$input] = esc_html( $_POST[$input] );
}

$DB->insert_data( $input_array );

$contents = file_get_contents( dirname(__FILE__) . '/tpl/edit.tpl' );
$contents = str_replace( '<%CONTENTS%>', $alert, $contents );

echo $contents;
