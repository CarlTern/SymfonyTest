<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use App\Service\MessageGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Heart;

class ArticleControllerSpace extends AbstractController
{
    var $entityManager;

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
            $entityManager = $this->getDoctrine()->getManager();
            $hearts = $this->getDoctrine()
            ->getRepository(Heart::class)
            ->findOneBy(['name' => 'test']);
            
            if (!$hearts) {
                $hearts = new Heart();
                $hearts->setName(test);
                $hearts->setHeartr(0);
                $hearts->setHeartStatus(false);
            }
    
        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $this->entityManager->persist($hearts);

        // actually executes the queries (i.e. the INSERT query)
        $this->entityManager->flush();

}

/**
     * @Route("/news/{slug}/heart", name="article_toggle_heart", methods={"POST"})
     */
public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
    // TODO - actually heart/unheart the article!
    $logger->info('Article is being hearted!');
    
    return new JsonResponse(['hearts' => $this->heartUpdater()]);
    }

public function heartUpdater()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $hearts = $this->getDoctrine()
            ->getRepository(Heart::class)
            ->findOneBy(['name' => 'test']);
        if($hearts){
        if($hearts->getHeartStatus()){
        $hearts->setHeartStatus(false);
        $newHeartNumber= $hearts->getHeartr();
        $newHeartNumber--;
        $hearts->setHeartr($newHeartNumber);
        } else if (!$hearts->getHeartStatus){
            $hearts->setHeartStatus(true);
            $newHeartNumber= $hearts->getHeartr();
            $newHeartNumber++;
            $hearts->setHeartr($newHeartNumber);
            }
            $entityManager->flush();
            return $hearts->getHeartr();
        }
        
    }
        
    
}