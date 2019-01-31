<?php
/**
 * Created by PhpStorm.
 * User: wap62
 * Date: 30/01/19
 * Time: 12:33
 */

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     * @param PropertyRepository $repository
     * @return Response
     *
     */
    public function index(PropertyRepository $repository):Response
    {
        $properties = $repository->findLatest();
        return $this->render('page/home.html.twig', [
            'properties' => $properties

        ]);
    }


}