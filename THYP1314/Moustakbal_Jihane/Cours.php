<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cours
 *
 * @author geralodin
 */
class Cours {
    
    public $debut;
    public $fin;
    public $id;
    public $nomUE;
    public $professeur;
    public $lieu;
    
    function __construct($debut, $fin, $idUE, $nomUE, $professeur, $lieu) {
        $this->debut = $debut;
        $this->fin = $fin;
        $this->idUE = $idUE;
        $this->nomUE = $nomUE;
        $this->professeur = $professeur;
        $this->lieu = $lieu;
    }
}

?>
