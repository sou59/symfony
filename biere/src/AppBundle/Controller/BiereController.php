<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Service\BiereService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class  BiereController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/list", name="list")
     */
    public function listAction() {
        $url = "http://127.0.0.1:8000/app_dev.php/beers";

        $response = Unirest\Request::get($url);
        return $this->render('default/list.html.twig', ['beers'=>$response->body]);

    }


    /**
     * @Route("/addApi", name="addApi")
     */
    public function addApiAction(Request $request) {

        $url = "http://127.0.0.1:8000/app_dev.php/addBiere";
        $name = $request->get('name');
        $price = $request->get('price');

        $response = Unirest\Request::post($url, $headers = array('name'=>$name, 'price'=>$price));

        return $this->redirectToRoute('list');


    }

}