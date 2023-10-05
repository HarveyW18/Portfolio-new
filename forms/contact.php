<?php
  // Remplacez 'wongaharvey@gmail.com' par votre adresse e-mail de réception réelle
  $receiving_email_address = 'wongaharvey@gmail.com';

  // Vérifiez si la bibliothèque "PHP Email Form" existe
  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
  } else {
    die('Impossible de charger la bibliothèque "PHP Email Form" !');
  }

  // Créez une instance de la classe PHP_Email_Form
  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // Définissez les détails de l'e-mail
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Décommentez et configurez les paramètres SMTP si vous souhaitez utiliser SMTP pour envoyer des e-mails
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  // Ajoutez les messages au corps de l'e-mail
  $contact->add_message('Nom : ' . $_POST['name'], 'From');
  $contact->add_message('Email : ' . $_POST['email'], 'Email');
  $contact->add_message('Message : ' . $_POST['message'], 'Message', 10);

  // Envoyez l'e-mail et renvoyez une réponse
  echo $contact->send();
?>
