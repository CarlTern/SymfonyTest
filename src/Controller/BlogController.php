<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page"="\d+"})
     */
    public function list($page = 1)
    {
        // ...
    }

    /**
     * Matches /blog/*
     * but not /blog/slug/extra-part
     *
     * @Route("/blog/{slug}", name="blog_show")
     */
    public function show(Request $request, $slug, LoggerInterface $logger)
    {
        $this->addFlash(
            'notice',
            'Your changes were saved!'
        );
        
        $random = random_int(0,5);
        $logger->info('We are logging!');
        return $this->render('blog/randomtext.html.twig', [
            'slug' => $slug,
            'number' => $random,
        ]);

        // $slug will equal the dynamic part of the URL
        // e.g. at /blog/yay-routing, then $slug='yay-routing'

        // ...
    }

     /**
     * Matches /blog/*
     * but not /blog/slug/extra-part
     *
     * @Route("/blog/test/download", name="blog_download")
     */
    public function download()
    {
        $file = new File('C:/xampp/php/CompatInfo.php','php_test_file.pdf');
    // send the file contents and force the browser to download it
    return $this->file($file, 'php_test_file.pdf');
    }
}