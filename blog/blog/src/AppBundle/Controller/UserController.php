<?php
namespace AppBundle\Controller;

use AppBundle\Service\BlogService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/createUser", name="createUser")
     */
    public function createUserAction(Request $request, BlogService $blogService)
    {

        if ($request->request->get('name')) {
            $entityManager = $this->getDoctrine()->getManager();
            $user = new User();
            $name = $request->request->get('name');
            $prenom = $request->request->get('prenom');
            $email = $request->request->get('emil');
            $password = $request->request->get('password');
            $role = $this->getDoctrine()->getRepository(Role::class)->find($request->request->get('role'));

            $user->setName('name');
            $user->setPrenom('prenom');
            $user->setEmail('email');
            $user->setPassword('password');
            $user->setRole($role);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute("users");
        }
        $roles = $blogService->getRoles();

        return $this->render('admin/addUser.html.twig', ['roles'=>$roles]);
    }

    /**
     * @Route("/updateUser")
     */
    public function updateUserAction()
    {
        return $this->render('AppBundle:User:update_user.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/remove")
     */
    public function removeAction()
    {
        return $this->render('AppBundle:User:remove.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/showUser")
     */
    public function showUserAction()
    {
        return $this->render('AppBundle:User:show_user.html.twig', array(
            // ...
        ));
    }



}
