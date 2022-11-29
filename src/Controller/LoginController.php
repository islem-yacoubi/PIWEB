<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\ConnexionType;
use App\Entity\User;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
 public function index(Request $request, UserRepository $repo): Response
    {
        $loginform = $this->createForm(type: ConnexionType::class);
        $loginform->handleRequest($request);
        $user =new User();
        if ($loginform->isSubmitted() && $loginform->isValid()) {
            $mail = $loginform['mail']->getData();
            $password = $loginform['password']->getData();

            $result = $repo->authentification($mail, $password);
            if (empty($result)) {
                return $this->render('login/index.html.twig', [
                    "loginform" => $loginform->createView()]);

            }


            return $this->render('user/hello.html.twig', []);
        }
       /* dd($user);*/

        return $this->render('login/index.html.twig', [
            "loginform" => $loginform->createView()
        ]);
    }


}
