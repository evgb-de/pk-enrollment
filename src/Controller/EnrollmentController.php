<?php

namespace Pagekit\pkenrollment\Controller;

use Pagekit\Application as App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('../Mail/PHPMailer.php');
require('../Mail/SMTP.php');
require('../Mail/Exception.php');

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
  * @Route("/save")
  * @Request({"entry": "array"}, csrf=true)
  */
  public function saveAction($entry = [])
  {
    $module = App::module('pkenrollment');
    $config = $module->config;
    $entries = $config['entries'];
    array_push($entries, $entry);
    $comma_separated = implode(",", $entry);
    $mail = new PHPMailer;

    $mail->isSMTP();                                // Set mailer to use SMTP
    $mail->Host = 'login23.schwarzkuenstler.info';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                         // Enable SMTP authentication
    $mail->Username = '';                           // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tls';                      // Enable encryption, 'ssl' also accepted

    $mail->From = '';                       // From Adress
    $mail->FromName = 'Musical Anmeldung';
    $mail->addAddress('', 'Tobiah');        // Add a recipient, Name is optional
    $mail->addReplyTo('', 'Information');   // Add Reply adress, Name is optional

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);                                  // Set email format to HTML
// ToDo: Add formattet Bodies
    $mail->Subject = 'Here is the subject';
    $mail->Body    = $comma_separated;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }


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
        'title' => __("Enrollment"),
        'name' => 'pkenrollment:views/index.php'
      ]
    ];
  }
}
?>