<?php

declare(strict_types=1);

namespace AdminPanel\Component\DataSource\Driver\Collection\Extension\Core\Field;

use AdminPanel\Component\DataSource\Driver\Collection\CollectionAbstractField;

/**
 * Datetime field.
 */
class DateTime extends CollectionAbstractField
{
    /**
     * {@inheritdoc}
     */
    protected $comparisons = ['eq', 'neq', 'lt', 'lte', 'gt', 'gte', 'in', 'notIn', 'between'];

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'datetime';
    }
}
