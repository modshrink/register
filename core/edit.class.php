<?php
require_once( dirname(__FILE__) . '/../config.php' );
require_once( dirname(__FILE__) . '/functions.php' );
require_once( dirname(__FILE__) . '/DB.class.php' );

class Edit {

	public function get_submit_data() {
		$label = esc_html( $_POST['label'] );
		$user = esc_html( $_POST['user'] );
		$password = esc_html( $_POST['password'] );
		$note = esc_html( $_POST['note'] );
		$url = esc_html( $_POST['url'] );
		$category = esc_html( $_POST['category'] );
	}

}
