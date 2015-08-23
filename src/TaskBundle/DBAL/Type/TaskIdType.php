<?php

namespace TaskBundle\DBAL\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use Domain\Task\Value\TaskId;

class TaskIdType extends Type
{
    const TASKID = 'taskid';

    /** @inheritdoc */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getGuidTypeDeclarationSQL($fieldDeclaration);
    }

    /** @inheritdoc */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return TaskId::createFromString($value);
    }

    /** @inheritdoc */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->getValue();
    }

    /** @inheritdoc */
    public function getName()
    {
        return self::TASKID;
    }
}
