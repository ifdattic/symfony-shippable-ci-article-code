<?php

namespace Spec\Domain\Task\Entity;

use Domain\Core\Spec\TestValues;
use Domain\Task\Entity\Task;
use Domain\Task\Value\TaskId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaskSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(TaskId::createFromString(TestValues::UUID));
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Task::CLASS);
    }

    function it_should_return_its_id()
    {
        $this->getId()->shouldHaveType(TaskId::CLASS);
    }
}
