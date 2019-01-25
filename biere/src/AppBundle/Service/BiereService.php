<?php

namespace AppBundle\Service;

use Unirest;

class BiereService {


    public $bieres;

    public function getAllBieres() {

        return $this->bieres;
    }

    public function getBiere($id) {

        return $this->bieres[$id];
    }

}