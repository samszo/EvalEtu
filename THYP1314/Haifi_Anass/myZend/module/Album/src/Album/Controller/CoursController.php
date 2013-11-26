<?php
// module/Album/src/Album/Controller/AlbumController.php:
namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel; 
use Album\Model\Cours;              

class CoursController extends AbstractActionController
{

	protected $CoursTable;
	
    public function indexAction()
    {
        return new ViewModel(array(
            'cours' => $this->getCoursTable()->fetchAll(),
        ));
    }
	
	public function getCoursTable()
    {
        if (!$this->CoursTable) {
            $sm = $this->getServiceLocator();
            $this->CoursTable = $sm->get('Album\Model\CoursTable');
        }
        return $this->CoursTable;
    }

  
}