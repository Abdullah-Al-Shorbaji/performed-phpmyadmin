<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

# Abdullah: Here is to handle with getting of homepage
class HomeController extends AbstractController
{
    #[Route('/', name: 'Home')]
    public function index(): Response
    {
        return new Response(
            "<h1 style='text-align: center;'><a href='/notes'>Notes page</a></h1>"
        );
    }
}
