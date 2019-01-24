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
use AppBundle\Entity\User;
use AppBundle\Entity\DetailCommand;
use AppBundle\Entity\Command;

class DetailCommandController extends Controller
{

    /**
     * @Route("/detailCommand", name="detailCommand", methods={"POST"})
     */
    public function addDetailCommandAction(Request $request){

        $detailCommand = new DetailCommand();
        $beer = $this->
        $user = new User();
        $category = new Category();
        $variable= json_decode($request->getContent(), true);

        $detailCommand = $variable['nomuser'];
        $category = $this->getDoctrine()->getRepository(Category::class)->find($category);
        $beer = $this->getDoctrine()->getRepository(Command::class)->find($beer);
        $user = $this->getDoctrine()->getRepository(Command::class)->find($user);

        $detailCommand->setName($detailCommand)
            ->setName($detailCommand)
            ->setCategory($category);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($detailCommand);
        $entityManager->persist($beer);
        $entityManager->flush();
        return new Response('Beer ok, id : '.$beer->getId() . $category->getId());
    }


}