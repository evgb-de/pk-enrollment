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
// ToDo: Somehow standardize the Shorthand @xxx and make the Path user-defineable so that one can Customize his Enrollment Page 

  'routes' => [
    '@musical' => [
      'path' => '/musical',
      'controller' => 'Pagekit\\pkenrollment\\Controller\\EnrollmentController'
    ]
  ],

  'permissions' => [

    'Enrollment: Manage Enrollments' => [
        'title' => 'Manage Enrollments',
        'description' => 'Manage Enrollments'
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
      'url'    => '@musical',
      'active' => '@musical/*',
      'access' => 'pkenrollment: manage || Enrollment: Manage Enrollments'
    ]
  ],
];
?>
