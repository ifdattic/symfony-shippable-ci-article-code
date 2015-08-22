<?php

namespace Domain\Core\Exception;

use Domain\Core\Exception\Domain;

class AssertionFailed extends Domain
{
    /** @var array */
    private $constraints;

    /** @var string */
    private $propertyPath;

    /** @var mixed */
    private $value;

    public function __construct($message, $code, $propertyPath = null, $value, array $constraints = [])
    {
        parent::__construct($message, $code);

        $this->propertyPath = $propertyPath;
        $this->value = $value;
        $this->constraints = $constraints;
    }

    /**
     * User controlled way to define a sub-property causing
     * the failure of a currently asserted objects.
     *
     * Useful to transport information about the nature of the error
     * back to higher layers.
     *
     * @return string
     */
    public function getPropertyPath()
    {
        return $this->propertyPath;
    }

    /**
     * Get the value that caused the assertion to fail.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the constraints that applied to the failed assertion.
     *
     * @return array
     */
    public function getConstraints()
    {
        return $this->constraints;
    }
}
