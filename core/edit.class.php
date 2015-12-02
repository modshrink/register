<?php
require_once( dirname(__FILE__) . '/../config.php' );
require_once( dirname(__FILE__) . '/functions.php' );
require_once( dirname(__FILE__) . '/login.class.php' );

class Edit {

public function register() {
	$label = $_POST['label'];
	$user = $_POST['user'];
	$password = $_POST['password'];
	$note = $_POST['note'];
	$url = $_POST['url'];
	$category = $_POST['category'];
}

} // class Edit end
