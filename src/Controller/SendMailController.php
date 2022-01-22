<?php

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class SendMailController extends AbstractController
{
    /**
     * @Route("/sendMail/newMessageReceive", name="send_notif_for_new_meassage", methods="POST")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $object = $request->get('object');
        $content = $request->get('content');
        $email = $request->get('email');
        $nom = $request->get('nom');
        $mail =(new TemplatedEmail())
            ->from('contact@clementgrandvaux.fr')
            ->to('clement.grandvaux@hotmail.com')
            ->subject('Nouveau message reçu sur Portfolio')
            ->htmlTemplate('mail/newMessageReceive.html.twig')
            ->context([
                'object' => $object,
                'content' => $content,
                'email' => $email,
                'nom' => $nom
            ]);
        $mailer->send($mail);
        return new JsonResponse(['response'=> true]);
    }
}
