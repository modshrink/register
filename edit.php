<?php
require_once( dirname(__FILE__) . '/core/edit.class.php' );

$edit = new Edit();
$DB = new DB();

$alert = $DB->db_connect_check_message();
$alert .= ssl_message();

$input_array = array();
foreach( input_data_list() as $input ) {
	$input_array[$input] = esc_html( $_POST[$input] );
}

if( $_POST['submit'] ) {
	$DB->insert_data( $input_array );
}

$contents = file_get_contents( dirname(__FILE__) . '/tpl/edit.tpl' );
$contents = str_replace( '<%CONTENTS%>', $alert, $contents );

echo $contents;
