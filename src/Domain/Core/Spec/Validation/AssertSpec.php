<?php

namespace Spec\Domain\Core\Validation;

use Assert\Assertion;
use Domain\Core\Validation\Assert;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AssertSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Assert::CLASS);
        $this->shouldHaveType(Assertion::CLASS);
    }
}
