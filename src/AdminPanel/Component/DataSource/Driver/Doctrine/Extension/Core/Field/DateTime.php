<?php

declare(strict_types=1);

namespace AdminPanel\Component\DataSource\Driver\Doctrine\Extension\Core\Field;

use AdminPanel\Component\DataSource\Driver\Doctrine\DoctrineFieldInterface;
use AdminPanel\Component\DataSource\Driver\Doctrine\ORM\Extension\Core\Field\DateTime as BaseDateTime;

/**
 * Datetime field.
 * @deprecated since version 1.2
 */
class DateTime extends BaseDateTime implements DoctrineFieldInterface
{
}
