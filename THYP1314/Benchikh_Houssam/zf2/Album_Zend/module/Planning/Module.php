<?php
// module/Album/Module.php
namespace Planning;


//use Album\Model\AlbumTable;
use Planning\Model\PlanningTable;
//Module
class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
	
	 public function getServiceConfig()
    {
        return array(
            'factories' => array(
                  'Planning\Model\PlanningTable' =>  function($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $table     = new PlanningTable($dbAdapter);
                    return $table;
                },
            ),
        );
    }
	
}