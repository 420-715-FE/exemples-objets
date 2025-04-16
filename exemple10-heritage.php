<?php

/* Le mot-clé `abstract` permet de créer une classe abstraite.
   Une classe abstraite est une classe qui ne peut pas être instanciée.
   On peut seulement en hériter. */
abstract class Utilisateur {
    /*
    Les membres protégés (protected) sont accessibles par les classes filles.
    */
    protected $nom;
    protected $prenom;
    protected $cours;

    function __construct($nom, $prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->cours = [];
    }

    function getNomComplet() {
        return $this->nom . ', ' . $this->prenom;
    }

    function ajouterCours($cours) {
        $this->cours[] = $cours;
    }

    function afficherCours() {
        echo "<ul>";
        foreach ($this->cours as $unCours) {
            echo "<li>$unCours</li>";
        }
        echo "</ul>";
    }

    /*
    Ici, on crée une méthode abstraite.
    Une méthode abstraite n'a pas d'implémentation dans la classe mère.
    Elle doit obligatoirement être implémentée dans les classes filles.
    Seule une classe abstraite peut avoir des méthodes abstraites.
    */
    abstract function afficher();
}

/*
La classe Etudiant hérite de la classe Utilisateur.
Tous les membres de la classe Utilisateur existent donc
aussi dans la classe Etudiant.
*/
class Etudiant extends Utilisateur {
    private $noDA;
    private $programme;

    function __construct($noDA, $nom, $prenom) {
        parent::__construct($nom, $prenom);

        $this->noDA = $noDA;
        $this->programme = "";
    }

    /*
    La classe fille implémente la classe abstraite de la classe mère.
    */
    function afficher() {
        echo $this->noDA . " " . $this->getNomComplet() . " (" . $this->programme . ")";
    }

    function setProgramme($programme) {
        $this->programme = $programme;
    }
}

/*
La classe Enseignant hérite elle aussi de la classe Utilisateur.
*/
class Enseignant extends Utilisateur {
    private $noEmploye;
    private $departement;

    function __construct($noEmploye, $nom, $prenom) {
        parent::__construct($nom, $prenom);
        
        $this->noEmploye = $noEmploye;
        $this->departement = "";
    }

    /*
    La classe Etudiant implémente elle aussi la méthode abstraite de la classe mère.
    */
    function afficher() {
        echo $this->noEmploye . " " . $this->getNomComplet() . " (" . $this->departement . ")";
    }

    function setDepartement($departement) {
        $this->departement = $departement;
    }
}

?>
