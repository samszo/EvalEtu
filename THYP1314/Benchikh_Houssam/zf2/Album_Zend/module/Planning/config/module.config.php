<?php
// module/Album/conﬁg/module.config.php:
// module/Album/conﬁg/module.conﬁg.php:
return array(
    'controllers' => array(
        'invokables' => array(
          
			'Planning\Controller\Planning' => 'Planning\Controller\PlanningController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'planning' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/planning[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Planning\Controller\Planning',
                        'action'     => 'index',
                    ),
                ),
            ),
			   
        ),
    ),

    'view_manager' => array(
       
	   'template_map'             => array(
            'planning/planning/index' => __DIR__ . '/../view/planning/planning/Planning.phtml',
            
        ),
        'template_path_stack' => array(
            __DIR__ . '/../views',
        ),
		'strategies' => array (
'ViewJsonStrategy'
),   
	   
	   
	   
	   
	   
	   
   
	   
	   
	   
	   
    ),
);