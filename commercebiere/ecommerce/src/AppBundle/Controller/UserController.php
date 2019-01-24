<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\User;

class UserController extends Controller
{

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
     * @Route("/addUser",name="addUser", methods={"POST"})
     */
    public function addUserAction(Request $request)
    {
        $user = new User();
        $variable= json_decode($request->getContent(), true);
        $name = $variable['name'];
        $prenom = $variable['prenom'];
        $age = $variable['age'];

        $user->setName($name)
            ->setPrenom($prenom)
            ->setAge($age);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($user);
        $entityManager->flush();
        return new Response('User ok, id : '.$user->getId());

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
     * @Route("/deleteUser/{id}", name="deleteUser", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function deleteBeerAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository(Beer::class)
            ->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($user);
        $entityManager->flush();

        return new Response("delete : ");

    }


}
