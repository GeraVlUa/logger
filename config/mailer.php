<?php

//return [
//    'class' => \yii\symfonymailer\Mailer::class,
//    'transport' => [
//        'class' => Swift_SmtpTransport::class,
//        'host' => 'sandbox.smtp.mailtrap.io',
//        'username' => 'adf616f5b3921c',
//        'password' => '32e60c09f75b64',
//        'port' => '2525',
//        'encryption' => 'tls',
//    ],
//];

return [
    'class' => \yii\symfonymailer\Mailer::class,
    'viewPath' => '@app/mail',
    // send all mails to a file by default.
    'useFileTransport' => true,
];
