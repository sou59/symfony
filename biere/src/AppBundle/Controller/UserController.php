<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class  UserController extends Controller {

    /**
     * @Route("/user",name="user")
     */
    public function createUserAction() {
        return $this->render('default/user.html.twig');
    }

    /**
     * @Route("/updateUser",name="updateUser")
     */
    public function updateUserAction() {
        return $this->render('default/updateUser.html.twig');
    }

    /**
     * @Route("/register",name="register")
     */
    public function listUserAction() {
        return $this->render('default/register.html.twig');
    }

}