<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Service\BiereService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class  BiereController extends Controller {

    /**
     * @Route("/addBiere", name="addBiere")
     */
    public function createBiereAction() {
        return $this->render('default/addBiere.html.twig');
    }

    /**
     * @Route("/updateBiere",name="updateBiere")
     */
    public function updateBiereAction() {
        return $this->render('default/updateBiere.html.twig');
    }

    /**
     * @Route("/listBiere",name="listBiere")
     */
    public function listBiereAction(BiereService $biereService) {
        return $this->render('default/listBiere.html.twig', ['bieres'=>$biereService->bieres]);
    }

    /**
     * @Route("/detailBiere/{id}",name="detailBiere", requirements={"id"="\d+"})
     */
    public function detailBiereAction(BiereService $biereService, $id) {

        $biere = $biereService->getBiere($id);
        return $this->render('default/detailBiere.html.twig', ['oneBiere'=>$biere]);
    }

}