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
    public $nom;
	public $img;
	public $pres;
    public $absc;
    function __construct($nom,$img,$pres,$absc) {
        $this->nom = $nom;
		$this->img = $img;
		$this->pres = $pres;
		$this->absc = $absc;
    }
	
	
	
	

}

?>
