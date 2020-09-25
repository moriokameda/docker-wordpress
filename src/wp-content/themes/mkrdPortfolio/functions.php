<?php
function my_wp_ajax() {

$nonce = $_REQUEST['nonce'];
if ( wp_verify_nonce( $nonce, 'my-ajax-nonce' ) ) {
  echo '返す値';
}
die();
}
add_action( 'wp_ajax_my_ajax', 'my_wp_ajax' );
add_action( 'wp_ajax_nopriv_my_ajax', 'my_wp_ajax' );
