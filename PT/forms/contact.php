<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */
  error_reporting(-1);
  ini_set('display_errors', 'On');
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'hello@emixpartners.com';

  


  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->subject = $_POST['email'];
  $contact->from_email = $_POST['email'];
  $contact->website = $_POST['website'];
  $contact->skype = $_POST['skype'];
  $contact->geos = $_POST['geos'];
  $contact->message = $_POST['message'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
 
  $contact->smtp = array(
    'host' => 'smtp-relay.gmail.com',
    'port' => '587'
  );
 

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
