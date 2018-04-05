<?php

use Pagekit\Application;

// packages/evgb-de/pkenrollment/index.php

return [
  'name' => 'pkenrollment',
  'type' => 'extension',
  // called when Pagekit initializes the module
  'main' => function (Application $app) {

  },
  'autoload' => [
    'Pagekit\\pkenrollment\\' => 'src'
  ],
  // Enable the pkenrollment: appreviation
  'resources' => [
    'pkenrollment:' => ''
  ],

  'routes' => [
    '@pkenrollment' => [
      'path' => '/pkenrollment',
      'controller' => 'Pagekit\\pkenrollment\\Controller\\EnrollmentController'
    ]
  ],


  'config' => [
    'entries' => [
    ]
  ],

  'menu' => [
    'pkenrollment' => [
      'label'  => 'Enrollments',
      'icon'   => 'app/system/assets/images/placeholder-icon.svg',
      'url'    => '@pkenrollment',
      'active' => '@pkenrollment/*',
      'access' => 'pkenrollment: manage'
    ]
  ],
];
?>
