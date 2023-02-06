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

use app\components\Logger;
use app\components\target\File;

return [
    'logger' => Logger::class,
    'traceLevel' => 3,
    'targets' => [
        'file' => [
            'class' => File::class,
            'levels' => ['info', 'error', 'warning'],
            'except' => ['_GET', '_POST', '_FILES', '_COOKIE', '_SESSION', '_SERVER'],
        ],
//        [
//            'class' => 'yii\log\DbTarget',
//            'levels' => ['error', 'warning'],
//        ],
//        [
//            'class' => 'yii\log\EmailTarget',
//            'levels' => ['error'],
//            'categories' => ['yii\db\*'],
//            'message' => [
//                'from' => ['log@example.com'],
//                'to' => ['admin@example.com', 'developer@example.com'],
//                'subject' => 'Database errors at example.com',
//            ],
//        ],
    ],
];
