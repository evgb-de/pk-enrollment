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
          'title' => 'Show Enrollments',
      ];
  }
  /**
  * @Request({"entry": "array"}, csrf=true)
  * @Access(admin=false)
  */
  public function saveAction($entry = [])
  {
    App::config('pkenrollment')->array_push('entries', $entry);
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
        'title' => __("Enrollment"),
        'name' => 'pkenrollment:views/index.php'
      ]
    ];
  }
}
?>