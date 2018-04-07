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
    '@zeltlager' => [
      'path' => '/zeltlager',
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
      'icon'   => 'packages/evgb-de/pk-enrollment/icon.svg',
      'url'    => '@zeltlager',
      'active' => '@zeltlager/*',
      'access' => 'pkenrollment: manage'
    ]
  ],
];
?>
