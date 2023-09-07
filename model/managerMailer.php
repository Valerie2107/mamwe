<?php

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

function sendMail()
{
    $name = htmlspecialchars(strip_tags(trim($_POST['name_contact'])), ENT_QUOTES);
    $mail = htmlspecialchars(strip_tags(trim($_POST['mail_contact'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message_contact'])), ENT_QUOTES);
    
    $transport =  Transport::fromDsn(MAIL_DSN);
    $mailer = new Mailer($transport);

   // envois du mail :
   $email = (new Email())

   ->from(MAIL_FROM)
   ->to(MAIL_ADMIN)
   ->subject("Nouveau message de " . $name)
   ->text($message)
   ->html($message);

   $mailer->send($email);


   //accusé de reception:
   $email = (new Email())

   ->from(MAIL_FROM)
   ->to($mail)
   ->subject("Votre message a bien été envoyé")
   ->text("Votre message a bien été envoyé");

   $mailer->send($email);
}