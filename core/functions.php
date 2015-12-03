<?php
// SSL確認
function is_ssl() {
	if ( $_SERVER['HTTPS'] == 'on' ) return true;
	return false;
}

function ssl_message() {
	if( is_ssl() ) :
$html = <<<EOM
<div role="alert" class="alert alert-success">
	<strong>SSL</strong> <p>Secure connection.</p>
</div>
EOM;
	else :
$html = <<<EOM
<div role="alert" class="alert alert-danger">
	<strong>SSL</strong> <p>Insecure connection.</p>
</div>
EOM;
	endif;

	return $html;
}

// エスケープ
function html_esc( $str ) {
	return htmlspecialchars( $str, ENT_QUOTES, 'UTF-8' );
}
