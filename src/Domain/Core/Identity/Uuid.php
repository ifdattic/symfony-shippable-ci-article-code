<?php

namespace Domain\Core\Identity;

use Domain\Core\Validation\Assert;
use Ramsey\Uuid\Uuid as RUuid;

final class Uuid
{
    /** @var string */
    private $value;

    /** @param string $value */
    public function __construct($value)
    {
        Assert::uuid($value);

        $this->value = $value;
    }

    /** @return Uuid */
    public static function generate()
    {
        return new static((string) RUuid::uuid4());
    }

    /** @return string */
    public function getValue()
    {
        return $this->value;
    }
}
