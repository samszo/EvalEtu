<?php

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
