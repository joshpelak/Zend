<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Kuser\Controller\Kuser' => 'Kuser\Controller\KuserController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'kuser' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/kuser',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Kuser\Controller',
                        'controller'    => 'Kuser',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    // This route is a sane default when developing a module;
                    // as you solidify the routes for your module, however,
                    // you may want to remove it and replace it with more
                    // specific routes.
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
    	'doctype' => 'HTML5',
        'template_path_stack' => array(
            'Kuser' => __DIR__ . '/../view',
        ),
    ),
		'doctrine' => array(
				'driver' => array(
						// overriding zfc-user-doctrine-orm's config
						'zfcuser_entity' => array(
								'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
								'paths' => __DIR__ . '/../src/Kuser/Entity',
						),

						'orm_default' => array(
								'drivers' => array(
										'Kuser\Entity' => 'zfcuser_entity',
								),
						),
				),
				),

				'zfcuser' => array(
						// telling ZfcUser to use our own class
						'user_entity_class'       => 'Kuser\Entity\User',
						// telling ZfcUserDoctrineORM to skip the entities it defines
						'enable_default_entities' => false,
				),

				'bjyauthorize' => array(
						// Using the authentication identity provider, which basically reads the roles from the auth service's identity
						'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

						'role_providers'        => array(
								// using an object repository (entity repository) to load all roles into our ACL
								'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
										'object_manager'    => 'doctrine.entity_manager.orm_default',
										'role_entity_class' => 'Kuser\Entity\Role',
								),
						),
				),
				);

