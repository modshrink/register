<?php
require_once( dirname(__FILE__) . '/core/DB.class.php' );
$DB = new DB();

$data_id = esc_html( $_GET['id'] );

$alert = $DB->db_connect_check_message();
$alert .= ssl_message();


$table = $DB->get_register_data( $data_id );

$content = file_get_contents( dirname(__FILE__) . '/tpl/index.tpl' );
$contents = str_replace( '<%CONTENTS%>', $alert , $content );
$contents .= str_replace( '<%CONTENTS%>', $table, $content );

echo $contents;
