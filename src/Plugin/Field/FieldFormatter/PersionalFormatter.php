<?php

namespace Drupal\persional\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
/**
 * Plugin implementation of the 'PersionalFormatter' formatter.
 *
 * @FieldFormatter(
 *   id = "PersionalFormatter",
 *   label = @Translation("Persional Format"),
 *   field_types = {
 *     "ersional"
 *   }
 * )
 */
class PersionalFormatter extends FormatterBase
{

    /**
     * Define how the field type is showed.
     *
     * Inside this method we can customize how the field is displayed inside
     * pages.
     */
    public function viewElements(FieldItemListInterface $items, $langcode)
    {
        $elements = [];
        foreach ($items as $delta => $item) {
            $elements[$delta] = [
                '#type' => 'markup',
                '#markup' => '<span class="bold">First Name:</span> ' . $item->first_name . ', ' . '<span class="bold">Last Name: </span>' . $item->last_name
            ];
        }

        return $elements;
    }
} // class
