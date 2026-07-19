<?php
// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class MailerController extends AbstractController
{
    #[Route('/email/transport', name:'app_email_transport') ]
    public function sendEmailT(TransportInterface $mailer): Response
    {
        
        $emailtw = new TemplatedEmail()
          ->from('philippe.regent@gmail.com')
        ->to('regent.philippe@orange.fr')
        ->subject('Thanks for signing up Transport email!')
        // path of the Twig template to render
        ->htmlTemplate('emails/signup.html.twig')
      // change locale used in the template, e.g. to match user's locale
      ->locale('de')
      // pass variables (name => value) to the template
      ->context([ 'expiration_date' => new \DateTime('+7 days'), 'username' => 'philippe',]);
       $mailer->send($emailtw);
      return new Response('<html><body>Email Transport envoyé</body></html>');
    }

     #[Route('/email/mailer', name:'app_email_mailer') ]
    public function sendEmailM(TransportInterface $mailer): Response
    {
        $email = new Email()
            ->from('philippe.regent@gmail.com')
            ->to('nicolemadeleine.regent@gmail.com')
            ->addTo('philippe.regent@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        $mailer->send($email);
      return new Response('<html><body>Email  Mailer envoyé</body></html>');
    }
}