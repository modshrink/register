<?php
require_once( dirname(__FILE__) . '/core/DB.class.php' );

$DB = new DB();

$alert = $DB->db_connect_check_message();
$alert .= ssl_message();
$alert .= $DB->create_table( 'data' );

//$table = $DB->get_register_data();


$contents = file_get_contents( dirname(__FILE__) . '/tpl/index.tpl' );
$contents = str_replace( '<%CONTENTS%>', $alert . $table, $contents );

echo $contents;
