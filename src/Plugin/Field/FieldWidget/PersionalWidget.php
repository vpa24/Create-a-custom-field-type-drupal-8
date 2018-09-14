<?php

namespace Drupal\persional\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 *  Plugin implementation of the 'PersionalWidget' widget.
 *
 * @FieldWidget(
 *   id = "PersionalWidget",
 *   label = @Translation("Persional Select"),
 *   field_types = {
 *     "persional"
 *   }
 * )
 */
class PersionalWidget extends WidgetBase
{

    /**
     * Define the form for the field type.
     *
     * Inside this method we can define the form used to edit the field type.
     *
     * Here there is a list of allowed element types: https://goo.gl/XVd4tA
     */
    public function formElement(
        FieldItemListInterface $items,
        $delta,
        array $element,
        array &$form,
        FormStateInterface $formState
    ) {


        $element['frist_name'] = [
            '#type' => 'textfield',
            '#title' => t('First Name'),

           '#default_value' => isset($items[$delta]->frist_name) ?
                $items[$delta]->frist_name : null,

            '#empty_value' => '',
            '#placeholder' => t('First Name'),
        ];

        $element['last_name'] = [
            '#type' => 'textfield',
            '#title' => t('last_name'),
            '#default_value' => isset($items[$delta]->last_name) ?
                $items[$delta]->last_name : null,
            '#empty_value' => '',
            '#placeholder' => t('Last Name'),
        ];

        return $element;
    }
} // class
