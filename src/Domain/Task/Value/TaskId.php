<?php

namespace Domain\Task\Value;

use Domain\Core\Identity\Uuid;

class TaskId
{
    /** @var Uuid */
    private $uuid;

    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return static
     */
    public static function generate()
    {
        return new static(Uuid::generate());
    }

    /**
     * @param  string $uuid
     * @return static
     */
    public static function createFromString($uuid)
    {
        $uuid = new Uuid($uuid);

        return new static($uuid);
    }

    /** @return string */
    public function getValue()
    {
        return $this->uuid->getValue();
    }

    /** @return string */
    public function __toString()
    {
        return $this->getValue();
    }
}
