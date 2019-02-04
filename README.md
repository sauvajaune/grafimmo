# grafimmo
 //mail de linscription
            $message = \Swift_Message::newInstance()
                ->SetSubject('inscription effectuee')
                ->SetFrom(array('sauvajaune@protonmail.com' => "Sauvajaune"))
                ->SetTo(array('vigouroux.r.f@gmail.com'))
                ->setCharset('utf-8')
                ->setContentType('text/html')
                ->setBody('');
            $this->get('mailer')->send($message);

smtp://localhost:25?encryption=&auth_mode=


/*******************SERVICES***********/
créons un service qui permet d'envoyer un mail contenant "Bienvenue à 3WAcademy " .Noter que 3WAcademy est un paramètre,
on utilisera les tags et une fonction twig pour afficher le message dans un fichier twig .

/*********** CORRECTION ************/

    /**
     * @Route("/service", name="service")
     */
    public function Message(SendMessage $sendMessage){
        $monservice =  $sendMessage->sendMessage();

        return $this->render('default/send.html.twig');
    }



- Dans services.yaml

    App\Monservice\SendMessage:
        arguments:
            - '@App\Monservice\Monservice'
            - "@mailer"
      
- <?php
namespace App\Monservice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Monservice extends AbstractController
{

    public function alert($institut){

        return 'Bienvenue à : '.$institut;
    }
}

<?php
namespace App\Monservice;

use App\Monservice\Monservice;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Response;

class SendMessage extends \Twig_Extension
{
    public $monservice;
    public $mailer;
    public $param;

    public function __construct(Monservice $monservice,\Swift_Mailer $mailer, ParameterBagInterface $param)
    {

        $this->monservice = $monservice;
        $this->mailer = $mailer;
        $this->param = $param;

    }
    public function sendMessage(){


        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('mgandega@gmail.com')
            ->setTo('mgandega@gmail.com')
            ->setBody(
                $this->monservice->alert($this->param->get('app_institut'))
            );
        $this->mailer->send($message);
        return new Response('Message bien envoyé');
     }

    // Twig va exécuter cette méthode pour savoir quelle(s) fonction(s) ajoute notre service
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('monservice', array($this, 'sendMessage')),
        );
    }


    // La méthode getName() identifie votre extension Twig, elle est obligatoire
/*    public function getName()
    {
        return 'OCAntispam';
    }
*/