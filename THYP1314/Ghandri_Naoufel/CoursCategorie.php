<?php


class CoursCategorie {
    public $lundi, $mardi, $mercredi, $jeudi, $vendredi;
    
    function __construct($lundi, $mardi, $mercredi, $jeudi, $vendredi) {
        $this->lundi = $lundi;
        $this->mardi = $mardi;
        $this->mercredi = $mercredi;
        $this->jeudi = $jeudi;
        $this->vendredi = $vendredi;
    }

}

?>
