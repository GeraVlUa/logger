<?php

namespace app\components\target;

use yii\log\EmailTarget;

class Email extends EmailTarget implements Target
{
    /**
     * @var array
     */
    public $message = [
        'from' => ['log@example.com'],
        'to' => ['admin@example.com', 'developer@example.com'],
        'subject' => 'Database errors at example.com',
    ];
}
