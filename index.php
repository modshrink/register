<?php
require_once( dirname(__FILE__) . '/core/login.class.php' );

$login = new Login();

$alert = $login->db_connect_check_message();
$alert .= ssl_message();

$contents = file_get_contents( dirname(__FILE__) . '/tpl/index.tpl' );
$contents = str_replace( '<%CONTENTS%>', $alert, $contents );

echo $contents;
