<?php

namespace App\Controller;

use App\Entity\Listing;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/", name="listing_")
 */
class ListingController extends AbstractController {
    
/**
 * @Route("/")
 */
    public function show(EntityManagerInterface $entityManager){
        $listings = $entityManager->getRepository(Listing::class)->findAll();
        
        return $this->render('listing.html.twig', ['listings'=>$listings]);
    }

    /**
     * @Route("/new", method="POST", name="create")
     */
    public function create(EntityManagerInterface $entityManager, Request $request) {
        $name = $request->get('name');
        $listing = new Listing();

        $entityManager->persist($listing);
        $entityManager->flush();

        return new Response("OK");
    }
}