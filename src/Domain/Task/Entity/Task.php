<?php

namespace Domain\Task\Entity;

use Domain\Task\Value\TaskId;

class Task
{
    /** @var TaskId */
    private $id;

    public function __construct(TaskId $id)
    {
        $this->id = $id;
    }

    /** @return TaskId */
    public function getId()
    {
        return $this->id;
    }
}
