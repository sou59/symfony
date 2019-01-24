<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Beer;
use AppBundle\Entity\Category;

class BeerController extends Controller
{

    /**
     * @Route("/beers", name="beers", methods={"GET"})
     */
    public function beerAction(Request $request)
    {

        $beers = $this->getDoctrine()->getRepository(Beer::class)->findAll();

        foreach($beers as $beer) {
            $beerOk[] = [
                'id'=>$beer->getId(),
                'name'=>$beer->getName(),
                'price'=>$beer->getPrice()
            ];
        }

        return new JsonResponse($beerOk);
    }

    /**
     * @Route("/addBeer", name="addBeer", methods={"POST"})
     */
    public function addBeerAction(Request $request){

        $category = new Category();

        $beer = new Beer();
        $variable= json_decode($request->getContent(), true);
        $name = $variable['name'];
        $price = $variable['price'];
        $category->setName($variable['name']);

        $beer->setName($name)
            ->setPrice($price)
            ->setCategory($category);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->persist($beer);
        $entityManager->flush();
        return new Response('Beer ok, id : '.$beer->getId() . $category->getId());
    }

    /**
     * @Route("/showBeer/{id}", name="showBeer", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function showBeerAction($id)
    {
        $beer = $this->getDoctrine()
            ->getRepository(Beer::class)
            ->find($id);

        $beerId = [
            'id'=>$beer->getId(),
            'name'=>$beer->getName(),
            'price'=>$beer->getPrice(),
            'category'=>$beer->getCategory()->getName()
        ];

        if (!$beer) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return new JsonResponse($beerId);

    }

    /**
     * @Route("/deleteBeer/{id}", name="deleteBeer", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function deleteBeerAction($id)
    {
        $beer = $this->getDoctrine()
            ->getRepository(Beer::class)
            ->find($id);

        if (!$beer) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($beer);
        $entityManager->flush();

        return new Response("delete : ");

    }


}