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

class CategoryController extends Controller
{
    /**
     * @Route("/addCategory", name="addCategory", methods={"POST"})
     */
    public function addCategorieAction(Request $request){

        $category = new Category();

        $variable= json_decode($request->getContent(), true);
        $name = $variable['name'];

        $category->setName($name);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($category);
        $entityManager->flush();
        return new Response('Beer ok, id : '.$category->getId());
    }

    /**
     * @Route("/categories", name="categories", methods={"GET"})
     */
    public function categoryAction(Request $request)
    {

        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        foreach($categories as $category) {
            $categoryOk[] = [
                'id'=>$category->getId(),
                'name'=>$category->getName()
            ];
        }

        return new JsonResponse($categoryOk);
    }

    /**
     * @Route("/showCategory/{id}", name="showCategory", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function showCategoryAction($id)
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);

        $categoryId = [
            'id'=>$category->getId(),
            'name'=>$category->getName()
        ];

        if (!$category) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return new JsonResponse($categoryId);

    }

    /**
     * @Route("/deleteCategory/{id}", name="deleteCategory", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function deleteCategoryAction($id)
    {
        $category = $this->getDoctrine()
            ->getRepository(Category::class)
            ->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($category);
        $entityManager->flush();

        return new Response("delete : ");

    }
}

