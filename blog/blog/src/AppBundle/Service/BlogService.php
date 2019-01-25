<?php

namespace AppBundle\Service;

use AppBundle\Entity\Role;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;


class BlogService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
    }


    public function getRoles() {
        return $this->em->getRepository("AppBundle:Role")->findAll();

    }

}