<?php
namespace AppBundle\Controller;

use AppBundle\Service\BlogService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\User;

class RoleController extends Controller
{
    /**
     * @Route("/roles", name="roles")
     */
    public function indexAction(BlogService $blogService)
    {
        $roles = $blogService->getRoles();
        return $this->render('default/roles.html.twig', ['roles'=>$roles]);

    }

    /**
     * @Route("/admin/addrole", name"addrole")
     */
    public function headerAction(Request $request) {
        if($request->request->get('name')) {
            $entityManager = $this->getDoctrine()->getManager();
            $role = new Role();
            $name = $request->request->get('name');
            $role->setName($name);
            $entityManager->persist($role);
            $entityManager->flush();
            return $this->redirectToRoute("roles");
        }
        return $this->render("admin/addRole.html.twig");
    }

}
