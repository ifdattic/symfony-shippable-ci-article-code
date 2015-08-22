<?php

namespace Spec\Domain\Core\Exception;

use Domain\Core\Exception\AssertionFailed;
use Domain\Core\Exception\Domain;
use Domain\Core\Spec\TestValues;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AssertionFailedSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(
            TestValues::ASSERTION_FAILED_MESSAGE,
            TestValues::ASSERTION_FAILED_CODE,
            null,
            TestValues::ASSERTION_FAILED_VALUE
        );
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AssertionFailed::CLASS);
        $this->shouldHaveType(Domain::CLASS);
    }
}
