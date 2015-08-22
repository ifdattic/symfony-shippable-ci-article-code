<?php

namespace Spec\Domain\Task\Value;

use Domain\Core\Exception\AssertionFailed;
use Domain\Core\Identity\Uuid;
use Domain\Core\Spec\TestValues;
use Domain\Task\Value\TaskId;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaskIdSpec extends ObjectBehavior
{
    function let()
    {
        $uuid = new Uuid(TestValues::UUID);

        $this->beConstructedWith($uuid);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TaskId::CLASS);
    }

    function it_should_return_its_value()
    {
        $this->getValue()->shouldReturn(TestValues::UUID);
    }

    function it_should_return_its_value_on_string_usage()
    {
        $this->__toString()->shouldReturn(TestValues::UUID);
    }

    function it_should_create_task_id_from_string()
    {
        $this->beConstructedThrough('createFromString', [TestValues::UUID]);

        $this->shouldHaveType(TaskId::CLASS);

        $this->getValue()->shouldReturn(TestValues::UUID);
    }

    function it_should_reject_invalid_uuid_string()
    {
        $this->beConstructedThrough('createFromString', [TestValues::INVALID_UUID]);

        $this->shouldThrow(AssertionFailed::CLASS)->duringInstantiation();
    }
}
