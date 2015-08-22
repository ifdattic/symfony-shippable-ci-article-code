<?php

namespace Spec\Domain\Core\Identity;

use Domain\Core\Exception\AssertionFailed;
use Domain\Core\Identity\Uuid;
use Domain\Core\Spec\TestValues;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\Uuid as RUuid;

class UuidSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(TestValues::UUID);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Uuid::CLASS);
    }

    function it_should_throw_an_exception_if_value_is_not_uuid()
    {
        $this->beConstructedWith(TestValues::INVALID_UUID);

        $this->shouldThrow(AssertionFailed::CLASS)->duringInstantiation();
    }

    function it_should_returns_its_value()
    {
        $this->getValue()->shouldReturn(TestValues::UUID);
    }

    function it_should_generate_an_uuid()
    {
        $this->beConstructedThrough('generate');

        $this->shouldHaveType(Uuid::CLASS);
    }
}
