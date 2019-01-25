<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Command;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Beer;
use AppBundle\Entity\Category;
use AppBundle\Entity\User;

class CommandController extends Controller
{

    /**
     * @Route("/addCommand", name="addCommand", methods={"POST"})
     */
    public function addBCommandAction(Request $request){

        $command = new Command();


        $variable= json_decode($request->getContent(), true);
        $user = $this->getDoctrine()->getRepository(User::class)->find($userId);
        $beer = $this->getDoctrine()->getRepository(Beer::class)->find($beerId);

        $num = $variable['name'];
        $pricebeer = $variable['price'];
        $category = $this->getDoctrine()->getRepository(Category::class)->find($category);

        $command->setName($name)
            ->setPriceBeer($pricebeer);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($pricebeer);
        $entityManager->persist($command);
        $entityManager->flush();
        return new Response('Command ok, id : ');
    }

}