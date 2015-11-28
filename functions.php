<?php
require_once( 'config.php' );

// SSL確認
function is_ssl() {
	if ( $_SERVER['HTTPS'] == 'on' ) return true;
	return false;
}

