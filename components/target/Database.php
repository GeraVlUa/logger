<?php

namespace app\components\target;

use yii\log\DbTarget;

class Database extends DbTarget implements Target
{
    /**
     * @var string
     */
    public $logTable = '{{%logs}}';
}
