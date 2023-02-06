<?php

namespace app\controllers;

use app\components\Logger;
use app\models\Test;
use DateTimeInterface;
use Exception;
use Yii;
use yii\web\ServerErrorHttpException;

class IndexController extends BaseController
{

    /**
     * Sends a log message to the default logger. */
    public function log()
    {
    }

    /**
     * Sends a log message to a special logger. *
     * @param string $type
     */
    public function logTo(string $type)
    {
    }

    /**
     * Sends a log message to all loggers. */
    public function logToAll()
    {
    }


    /**
     * @return string
     */
    private function randomString(): string
    {
        return date(DateTimeInterface::ATOM);
    }

    /**
     * @return void
     */
    private function storeInDB(): void
    {
        $model = new Test([
            'text' => $this->randomString()
        ]);
        $model->save();

        $this->info($model->toArray());
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->storeInDB();

        return $this->render('index');
    }

    /**
     * @param array $data
     * @return void
     */
    private function info(array $data = []): void
    {
        /** @var Logger $logger */
        $logger = Yii::$app->getLog()->getLogger();

        $logger->log($data);
        $logger->logEmail($data);
        $logger->logDB($data);
    }
}
