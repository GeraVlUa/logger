<?php

namespace app\components;

interface LoggerInterface
{
    /**
     * Sends message to current logger.
     *
     * @param array $message
     * @return void
     */
    public function send(array $message): void;

    /**
     * Sends message by selected logger.
     *
     * @param array $message
     * @param string $type
     * @return void
     */
    public function sendByType(array $message, string $type): void;

    /**
     * Gets current
     *
     * @return string
     */
    public function getType(): ?string;

    /**
     * Sets current logger type.
     *
     * @param string $type
     * @return $this
     */
    public function setType(string $type): self;
}
