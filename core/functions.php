<?php
// SSL確認
function is_ssl() {
	if ( $_SERVER['HTTPS'] == 'on' ) return true;
	return false;
}

function ssl_message() {
        if( is_ssl() ) : ?>
        <div role="alert" class="alert alert-success">
                <strong>SSL</strong> <p>Secure connection.</p>
        </div>
        <?php else : ?>
        <div role="alert" class="alert alert-danger">
                <strong>SSL</strong> <p>Insecure connection.</p>
        </div>
        <?php endif;
}
