<?php

namespace Domain\Core\Validation;

use Assert\Assertion;
use Domain\Core\Exception\AssertionFailed;

class Assert extends Assertion
{
    /** @inheritdoc */
    protected static $exceptionClass = AssertionFailed::CLASS;
}
