<?php

namespace Pagekit\pkenrollment\Controller;

use Pagekit\Application as App;

class EnrollmentController
{
  /**
  * @Access(admin=true)
  */
  public function indexAction()
  {
      $module = App::module('pkenrollment');
      $config = $module->config;
      return [
          '$view' => [
              'title' => __('Enrollments'),
              'name' => 'pkenrollment:views/admin/index.php'
          ],
          '$data' => [
              'config' => $config
          ],
          'entries' => $config['entries'],
          'title' => 'Manage Enrollments',
      ];
  }
  /**
  * @Request({"entries": "array"}, csrf=true)
  * @Access(admin=true)
  */
  public function saveAction($entries = [])
  {
    App::config('pkenrollment')->set('entries', $entries);
    return ['message' => 'success'];
  }

  /**
  * @Route("/")
  */
  public function siteAction()
  {
    $module = App::module('pkenrollment');
    $config = $module->config;
    return [
      '$view' => [
        'title' => __("Enrollments"),
        'name' => 'pkenrollment:views/index.php'
      ],
      'entries' => $config['entries']
    ];
  }
}
?>
