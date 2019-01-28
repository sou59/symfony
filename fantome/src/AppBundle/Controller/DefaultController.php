<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Beer;
use AppBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/beers", name="beers", methods={"GET"})
     */
    public function beerAction(Request $request)
    {
        /*return new JsonResponse([
            [
                "name"=>"Jupiler",
                "prix"=>3.50
            ],
            [
                "name"=>"Leef",
                "prix"=>"2.5"
            ]
        ]);*/

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
     * @Route("/user", name="users", methods={"GET"})
     */
    public function UserAction(Request $request)
    {

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        foreach($users as $user) {
            $userOk[] = [
                'id'=>$user->getId(),
                'name'=>$user->getName(),
                'prenom'=>$user->getPrenom(),
                'age'=>$user->getAge()
            ];
        }

        return new JsonResponse($userOk);
    }


    /**
     * @Route("/addBeer",name="addBeer", methods={"POST"})
     */
//    public function addBeerAction()
//    {
//        $entityManager = $this->getDoctrine()->getManager();
//        $beer = new Beer();
//        $beer->setName('Tartine')
//            ->setPrice('4.12');
//
//        $entityManager->persist($beer);
//        $entityManager->flush();
//
//        return new Response('Beer ok, id : ' . $beer->getId());
//
//
//    }


    /**
     * @Route("/addUser",name="addUser", methods={"POST"})
     */
    public function addUserAction()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName('Maud')
            ->setPrenom('Titi')
            ->setAge(25);

        $entityManager->persist($user);
        $entityManager->flush();

        return new Response('User ok, id : ' . $user->getId());

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
     * @Route("/showUser/{id}", name="showUser", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function showUserAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->find($id);

        $userId = [
            'id'=>$user->getId(),
            'name'=>$user->getName(),
            'prenom'=>$user->getPrenom(),
            'age'=>$user->getAge()
        ];

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return new JsonResponse($userId);

    }

    /**
     * @Route("/deleteUser/{id}", name="deletUser", methods={"DELETE"}, requirements={"id"="\d+"})
     */
    public function deleteUserAction($id)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $user = $entityManager->getRepository(User::class)
            ->find($id);

        $entityManager->remove($user);
        $entityManager->flush();

        return new Response('Remove user ok');

    }

    /**
     * @Route("/updateUser/{id}", name="updateUser", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function updateUser() {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);

        if(!$user) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $user->setName('new user');
        $entityManager->flush();
        return $this->redirectToRoute('users');
    }

}
