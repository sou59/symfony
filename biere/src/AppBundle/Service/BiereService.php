<?php

namespace AppBundle\Service;


class BiereService {

    public $bieres = [
        [
            "id"=>"1",
            "nom"=>"Biere 1",
            "degree"=>"9",
            "description"=>"Biere 1 magnifique",
            "prix"=>"12",
            "image"=>"biere1.jpeg",
            "volume"=>"33",
            "prixlitre"=>"10",
            "type"=>"brune",
            "pays"=>"France"

        ],
        [
            "id"=>"2",
            "nom"=>"Leef",
            "degree"=>"5",
            "description"=>"La Leef est super",
            "prix"=>"5",
            "image"=>"biere2.jpeg",
            "volume"=>"50",
            "prixlitre"=>"10",
            "type"=>"ambree",
            "pays"=>"France"
        ],
        [
            "id"=>"3",
            "nom"=>"Pe Dieu",
            "degree"=>"20",
            "description"=>"Pe Dieu c'est moi!",
            "prix"=>"8",
            "image"=>"biere3.jpeg",
            "volume"=>"50",
            "prixlitre"=>"10",
            "type"=>"Blonde",
            "pays"=>"France"
        ],
        [
            "id"=>"4",
            "nom"=>"Jupiler",
            "degree"=>"3",
            "description"=>"Jupiler, ç'a existe encore",
            "prix"=>"3",
            "image"=>"biere4.jpeg",
            "volume"=>"33",
            "prixlitre"=>"8",
            "type"=>"Blonde",
            "pays"=>"France"
        ]
    ];

    public function getAllBieres() {

        return $this->bieres;
    }

    public function getBiere($id) {

        return $this->bieres[$id];
    }

}