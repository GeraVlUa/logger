<?php

namespace app\components;

use app\components\target\Database;
use app\components\target\Email;
use app\components\target\File;
use app\components\target\Target;
use Yii;
use \yii\log\Logger as BaseLogger;

class Logger extends BaseLogger implements LoggerInterface
{
    /**
     * Type file
     */
    public const TYPE_FILE = 'file';

    /**
     * Type email
     */
    public const TYPE_EMAIL = 'email';

    /**
     * Type database
     */
    public const TYPE_DB = 'database';

    /**
     * @var string|null
     */
    protected ?string $type = null;

    /**
     * @var string
     */
    protected string $message = '';

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type ?? self::TYPE_FILE;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Sends message to current logger.
     *
     * @param array $message
     * @return void
     */
    public function send(array $message): void
    {
        $this->sendByType($message, $this->getType());
    }

    /**
     * Sends message by selected logger.
     *
     * @param array $message
     * @param string $type
     * @return void
     */
    public function sendByType(array $message, string $type): void
    {
        $targetClass = match ($type) {
            self::TYPE_DB => Database::class,
            self::TYPE_EMAIL => Email::class,
            self::TYPE_FILE => File::class,
        };

        /** @var Target $target */
        $target = Yii::createObject($targetClass);

        $target->collect([$message], true);
    }

    /**
     * @param $message
     * @param $level
     * @param $category
     * @return void
     */
    public function log($message, $level = self::LEVEL_INFO, $category = 'develop'): void
    {
        $this->send([$message, $level, $category, microtime(true)]);
    }

    /**
     * @param $message
     * @param $level
     * @param $category
     * @return void
     */
    public function logEmail($message, $level = self::LEVEL_INFO, $category = 'develop'): void
    {
        $this->sendByType([$message, $level, $category, microtime(true)], self::TYPE_EMAIL);
    }

    /**
     * @param $message
     * @param $level
     * @param $category
     * @return void
     */
    public function logDB($message, $level = self::LEVEL_INFO, $category = 'develop'): void
    {
        $this->sendByType([$message, $level, $category, microtime(true)], self::TYPE_DB);
    }
}
