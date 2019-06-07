<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use App\Service\MessageGenerator;

class ArticleControllerSpace extends AbstractController
{
    /**
     * @Route(
     *     "/news/{slug}",
     * )
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
            ]);
}
}