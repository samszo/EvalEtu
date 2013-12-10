<?php
// module/Album/conﬁg/module.config.php:
// module/Album/conﬁg/module.conﬁg.php:
return array(
    'controllers' => array(
        'invokables' => array(
            'Album\Controller\Album' => 'Album\Controller\AlbumController',
			'Album\Controller\Cours' => 'Album\Controller\CoursController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'album' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/album[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Album',
                        'action'     => 'index',
                    ),
                ),
            ),
			    'cours' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/cours[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Album\Controller\Cours',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
       
	   'template_map'             => array(
            'album/album/index' => __DIR__ . '/../view/album/album/index.phtml',
            'album/cours/index'     => __DIR__ . '/../view/album/album/cours.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../views',
        )
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
	   
    ),
);