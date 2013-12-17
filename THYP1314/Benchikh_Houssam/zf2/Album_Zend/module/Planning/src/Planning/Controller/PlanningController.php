<?php
// module/Album/src/Album/Controller/AlbumController.php:
namespace Planning\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Planning\Model\Planning;              

use Zend\View\Model\JsonModel;   
use stdClass;

class PlanningController extends AbstractActionController
{

	protected $PlanningTable;
	
    public function indexAction()
    {
        return new ViewModel(array(
            'Planning' => $this->getPlanningTable()->fetchAll(),
        ));
    }
	
	public function getPlanningTable()
    {
        if (!$this->PlanningTable) {
            $sm = $this->getServiceLocator();
            $this->PlanningTable = $sm->get('Planning\Model\PlanningTable');
        }
        return $this->PlanningTable;
    }

    
    public function answerAction(){
            $v = $this->getstudent();// getalbum
			$result = new JsonModel(array(
			'param' => $v ,
            'success'=>true,
        ));

        return $result;
 
}
  
public function getstudent(){
$handle = fopen("http://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr", "rb");

// buffer contenant les données du flux
$myArr = array();
$varia = '';
$flux = '';

// si la lecture du flux RSS est ok
if (isset($handle) && !empty($handle)) {
    while (!feof($handle)) {
       
    // on charge les données de notre flux RSS par paquet
    $flux .= fread($handle, 4096);
    }

    // test avec la classe SimpleXML
    // on construit notre parser RSS avec notre flux RSS
    $RSS2Parser = simplexml_load_string($flux);

    // on se positionne sur la balise (racine de notre flux RSS)
    $racine = $RSS2Parser->channel;

    // pour chaque item
    foreach($racine ->item as $element) {
       
        /*var_dump($element->description);
        die();*/
       
        //retourne la position de la chaine en paramètre dans une chaine
        $linkPosition = stripos($element->description, "src");
       
        //couper la chaine de caractère à partir de la position indiqué
        $link = substr($element->description, $linkPosition);
       
        //on les découpe selon notre ...
        $trueLink = explode('</a>', $link);
    $desc = utf8_decode((string)$element->title);
        $object = new stdClass;
        $object->desc = $desc;
        $object->img = $trueLink[0];
        $myArr[] = $object;
        //$personne[] = new Personne($trueLink[0],$desc);
    }    
}
return  $myArr;
}
}