<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CoursCategorie
 *
 * @author geralodin
 */
class CoursCategorie {
	
    public $lundi;
    public $mardi;
    public $mercredi; 
    public $jeudi;
    public $vendredi;
    
    function __construct($lundi, $mardi, $mercredi, $jeudi, $vendredi) {
        $this->lundi = $lundi;
        $this->mardi = $mardi;
        $this->mercredi = $mercredi;
        $this->jeudi = $jeudi;
        $this->vendredi = $vendredi;
    }

}

?>
