<?php

namespace Spec\Domain\Core\Exception;

use Domain\Core\Exception\Domain;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DomainSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Domain::CLASS);
    }
}
