<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contacts@example.com with your real receiving email address
  $receiving_email_address = 'contacts@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contacts = new PHP_Email_Form;
  $contacts->ajax = true;
  
  $contacts->to = $receiving_email_address;
  $contacts->from_name = $_POST['email'];
  $contacts->from_email = $_POST['email'];
  $contacts->subject ="New Subscription: " . $_POST['email'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contacts->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contacts->add_message( $_POST['email'], 'Email');

  echo $contacts->send();
?>
