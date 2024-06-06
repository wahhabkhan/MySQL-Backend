<?php
// email-sending-script.php

use Yii;
use yii\mail\MessageInterface;

// Assuming you have POST data and CSRF validation set up
$recipientEmail = $_POST['recipientEmail'];
$name = $_POST['name'];
$email = $_POST['email'];
$description = $_POST['description'];

// Use Yii2's mailer component to send the email
Yii::$app->mailer->compose()
    ->setFrom($email)
    ->setTo($recipientEmail)
    ->setSubject('Message from ' . $name)
    ->setTextBody($description)
    ->send();
