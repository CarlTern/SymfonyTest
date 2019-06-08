<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use App\Service\MessageGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;

class ArticleControllerSpace extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homePage()
    {
        return $this->render('articleSpace/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}", name="article_show")
     */
    public function show($slug)
    {

        $comments = [
            'Comment test Comment test Comment test Comment test Comment test ',
            'Testing comments Testing comments Testing comments Testing comments ',
            'Comments comments Comments comments Comments comments Comments comments',
        ];
       

        return $this->render('articleSpace/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
            'slug' => $slug,
            ]);
            
}

/**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
    // TODO - actually heart/unheart the article!
    $logger->info('Article is being hearted!');
    return new JsonResponse(['hearts' => random_int(5, 100)]);
    }
}