<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use App\Service\MessageGenerator;

class ArticleController extends AbstractController
{
    /**
     * @Route(
     *     "/articles/{_locale}/{year}/{slug}.{_format}",
     *     defaults={
     *         "_locale": "en",
     *         "_format": "html"
     *     },
     *     requirements={
     *         "_locale": "en|fr",
     *         "_format": "html|rss",
     *         "year": "\d+"
     *     }
     * )
     */
    public function show($_locale, $year, $slug, LoggerInterface $logger,
                        MessageGenerator $messageGenerator)
    {
        $message = $messageGenerator->getWelcomeMessage();

        if($_locale =='en'){

            return $this->render('article/english.html.twig', [
                'year' => $year, 
            ]);        
        } else if($_locale =='fr'){
                return $this->render('article/french.html.twig', [
                    'year' => $year,
                ]);        
        }
                $logger->info('We are logging!');
        
    }
}