<?php


class Pizza {

    // Attributes
    private $id;
    private $name;
    private $prix;

    // Constructor
    public function __construct($id = null, $name= "inconnue", $prix = 10,$categorie=1) {
        $this->setId($id);
        $this->setName($name);
        $this->setPrix($prix);
        $this->setCategorie($categorie);
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getPrix() {
        return $this->prix;
    }
    public function getCategorie() {
        return $this->categorie;
    }

    // Setters
    public function setId($id) {
        // Secure ...
        $this->id = $id;
    }
    public function setName($name) {
        // Secure ...
        $this->name = $name;
    }
    public function setPrix($prix) {
        // Secure ...
        $this->prix = $prix;
    }
    public function setCategorie($categorie) {
        // Secure ...
        $this->categorie = $categorie;
    }
    // Methods

}
