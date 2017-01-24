<?php

namespace AdminPanel\Symfony\AdminBundle\DataGrid\Extension\View\ColumnTypeExtension;

use FSi\Component\DataGrid\Column\ColumnTypeInterface;
use FSi\Component\DataGrid\Column\ColumnAbstractTypeExtension;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\Translation\TranslatorInterface;

class BooleanColumnExtension extends ColumnAbstractTypeExtension
{
    /**
     * Symfony Translator to generate translations.
     *
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritDoc}
     */
    public function getExtendedColumnTypes()
    {
        return array('boolean');
    }

    /**
     * {@inheritDoc}
     */
    public function initOptions(ColumnTypeInterface $column)
    {
        $column->getOptionsResolver()->setDefaults(array(
            'true_value' => $this->translator->trans('datagrid.boolean.yes', array(), 'FSiAdminBundle'),
            'false_value' => $this->translator->trans('datagrid.boolean.no', array(), 'FSiAdminBundle')
        ));

        $translator = $this->translator;
        $column->getOptionsResolver()->setNormalizer(
            'form_options',
            function(Options $options, $value) use ($translator) {
                if ($options['editable'] && count($options['field_mapping']) == 1) {
                    $field = $options['field_mapping'][0];

                    return array_merge(
                        array(
                            $field => array(
                                'choices' => array(
                                    0 => $translator->trans('datagrid.boolean.no', array(), 'FSiAdminBundle'),
                                    1 => $translator->trans('datagrid.boolean.yes', array(), 'FSiAdminBundle')
                                )
                            )
                        ),
                        $value
                    );
                }

                return $value;
            }
        );
        $column->getOptionsResolver()->setNormalizer(
            'form_type',
            function(Options $options, $value) {
                if ($options['editable'] && count($options['field_mapping']) == 1) {

                    $field = $options['field_mapping'][0];

                    return array_merge(
                        array($field => 'choice'),
                        $value
                    );
                }

                return $value;
            }
        );
    }
}