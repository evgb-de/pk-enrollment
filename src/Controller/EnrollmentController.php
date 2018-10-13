<?php

namespace Pagekit\pkenrollment\Controller;

use Pagekit\Application as App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('/<path>/pagekit/packages/evgb-de/pk-enrollment/src/Mail/PHPMailer.php');
require('/<path>/pagekit/packages/evgb-de/pk-enrollment/src/Mail/SMTP.php');
require('/<path>/pagekit/packages/evgb-de/pk-enrollment/src/Mail/Exception.php');

class EnrollmentController
{
  /**
  * @Access(admin=true)
  * @Access("Enrollment: Manage Enrollments")
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
    if ($entry["participants"][0]["Gender"] == "Weiblich") {
        $body = "<h1>Liebe ".$entry["participants"][0]["Prename"].",</h1>";
    } else {
        $body = "<h1>Lieber ".$entry["participants"][0]["Prename"].",</h1>";
    }
    $body .= "Your Body";
    if ($entry["participants"][0]["Gender"] == "Weiblich") {
        $altbody = "Liebe ".$entry["participants"][0]["Prename"].",\n";
    } else {
        $altbody = "Lieber ".$entry["participants"][0]["Prename"].",\n";
    }
    $altbody .= "Non-HTML Body";

    $mail = new PHPMailer;

    $mail->isSMTP();                                // Set mailer to use SMTP
    //$mail->SMTPDebug = 4;                         // enable debugging
    $mail->Host = '';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                         // Enable SMTP authentication
    $mail->Username = '';                           // SMTP username
    $mail->Password = '';                               // SMTP password
    $mail->SMTPSecure = 'tls';                          // Enable encryption, 'ssl' also accepted

    $mail->From = '';                                   // From Adress
    $mail->FromName = '';
    $mail->addAddress($entry["participants"][0]["EMail"], $entry["participants"][0]["Prename"]);        // Add a recipient, Name is optional
    $mail->AddBCC('', 'Name');                          // BCC
    $mail->addReplyTo('', 'Information');               // Reply

    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->CharSet = "UTF-8";
    $mail->Subject = 'Subject';
    $mail->Body    = $body;
    $mail->AltBody = $altbody;

    if(!$mail->send()) {
        echo $entry["participants"][0]["EMail"];
        echo ' Mailer Error: ' . $mail->ErrorInfo;
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
