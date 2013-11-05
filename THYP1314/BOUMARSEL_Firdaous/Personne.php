<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author geralodin
 */
class Personne {
    public $img;
   public $titre;
    
    
    function __construct($img, $titre) {
        $this->img = $img;
        $this->titre = $titre;
    }
    
   // function __construct($titre){
    	
    //	$this->titre = $titre;
    //}

}

?>
