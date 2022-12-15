<?php

namespace App\Controller;

use App\Entity\Post;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    #[Route('/post', name: 'app_post')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $posts = $doctrine->getRepository(Post::class)->findBy([],["datePub"=>"ASC"]);
        return $this->render('post/index.html.twig',
        [
            'posts' => '$posts',
        ]);
    }

    #[Route("/post/{id}", name:"show_post")]
    public function show(Post $post): Response
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }
}
