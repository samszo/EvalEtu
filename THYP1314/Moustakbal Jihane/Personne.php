<?php

class Personne {
     public $nom;
	 public $img;
	 public $pres;
     public $abs;
    
	function __construct($nom,$img,$pres,$abs) {
        $this->nom = $nom;
		$this->img = $img;
		$this->pres = $pres;
		$this->abs = $abs;
    }
}

?>
