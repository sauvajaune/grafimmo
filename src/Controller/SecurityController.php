<?php
/**
 * Created by PhpStorm.
 * User: wap62
 * Date: 01/02/19
 * Time: 11:46
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils) {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils ->getLastUsername();
        return $this->render('security/login.html.twig', [
            'last_username'=> $lastUsername,
            'error'=>$error
        ]);

    }
}