<?php

class Cours {

    public $unite,$objet,$intervenant,$lieu;

    function __construct( $UE,$objet,$intervenant, $lieu) {
        $this->unite = $UE;
        $this->objet = $objet;
        $this->intervenant = $intervenant;
        $this->lieu = $lieu;
    }
}
?>
