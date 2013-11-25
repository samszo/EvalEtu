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
    
    public $debut, $fin, $idUE, $nomUE, $intervenant, $lieu;
    
    function __construct($debut, $fin, $idUE, $nomUE, $intervenant, $lieu) {
        $this->debut = $debut;
        $this->fin = $fin;
        $this->idUE = $idUE;
        $this->nomUE = $nomUE;
        $this->intervenant = $intervenant;
        $this->lieu = $lieu;
    }
}
?>
