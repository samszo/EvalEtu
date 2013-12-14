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
	public $nom;
    
    function __construct($img,$nom) {
        $this->img = $img;
		$this->nom = $nom;
    }

}


?>
