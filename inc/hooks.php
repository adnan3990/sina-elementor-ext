<?php 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sina_ajax_contact(){
	if ( check_ajax_referer( 'sina_contact', 'nonce') ) {
		$email = $_POST['email'];
		$name = $_POST['name'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$admin_email = get_option('admin_email');
		$err = '';

		if ( '' == $name) {
			$err = 'Name can\'t be empty!';
		} elseif ( strlen($name) < 3 ) {
			$err = 'Name too short! Must be contain 3-20 characters.';
		} elseif ( strlen($name) > 32 ) {
			$err ='Name too large! Must be contain 3-20 characters.';
		} elseif ( preg_match("/^[a-zA-Z][ a-z0-9]{2,19}$/", $name) ) {
			$name = $name;
		} else {
			$err = 'Special characters have been detected in your name, which is not allowed.';
		}

		if ( '' == $err ) {
			if ( '' == $email) {
				$err = 'Email can\'t be empty!';
			} elseif ( strlen($email) < 6 ) {
				$err = 'Email too short! Must be contain 6-32 characters.';
			} elseif ( strlen($email) > 32 ) {
				$err = 'Email too large! Must be contain 6-32 characters.';
			} elseif ( sanitize_email( $email ) ) {
				$email = sanitize_email( $email );
			} else {
				$err = 'Invalid email!';
			}
		}

		if ( '' == $err ) {
			if ( '' == $subject) {
				$err = 'Subject can\'t be empty!';
			} elseif ( strlen($subject) < 3 ) {
				$err = 'Subject too short! Must be contain 3-200 characters.';
			} elseif ( strlen($subject) > 200 ) {
				$err = 'Subject too large! Must be contain 3-200 characters.';
			} elseif ( sanitize_text_field( $subject ) ) {
				$subject = sanitize_text_field( $subject );
			} else{
				$err = 'Invalid subject!';
			}
		}

		if ( '' == $err ) {
			if ( '' == $message) {
				$err = 'Message can\'t be empty!';
			} elseif ( strlen($message) < 3 ) {
				$err = 'Message too short! Must be contain 3-2000 characters.';
			} elseif ( strlen($message) > 2000 ) {
				$err = 'Message too large! Must be contain 3-2000 characters.';
			} elseif ( sanitize_textarea_field( $message ) ) {
				$message = sanitize_textarea_field( $message );
			} else{
				$err = 'Invalid message!';
			}

			if ( '' == $err ) {
				wp_mail( $email, $subject, $message, "From: {$admin_email}\r\n" );
			}
		}
		echo $err;
	}
	die();
}
add_action( 'wp_ajax_sina_contact', 'sina_ajax_contact' );
add_action( 'wp_ajax_nopriv_sina_contact', 'sina_ajax_contact' );