<?php

namespace App\Controller;

use App\Entity\Listing;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class ListingController extends AbstractController {
    
/**
 * @Route("/")
 */
    public function show(EntityManagerInterface $entityManager){
        $listings = $entityManager->getRepository(Listing::class)->findAll();
        
        return $this->render('listing.html.twig', ['listings'=>$listings]);
    }
}