<?php
namespace Drupal\persional\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface as StorageDefinition;

/**
 *
 * @FieldType(
 *   id = "persional",
 *   label = @Translation("Persional"),
 *   description = @Translation("Stores an persional."),
 *   category = @Translation("Custom"),
 *   default_widget = "PersionalWidget",
 *   default_formatter = "PersionalFormatter"
 * )
 */
class Persional extends FieldItemBase
{

    /**
     * Field type properties definition.
     *
     * Inside this method we defines all the fields (properties) that our
     * custom field type will have.
     *
     * Here there is a list of allowed property types: https://goo.gl/sIBBgO
     */
    public static function propertyDefinitions(StorageDefinition $storage)
    {
        $properties = [];

        $properties['first_name'] = DataDefinition::create('string')
            ->setLabel(t('First Name'));

        $properties['last_name'] = DataDefinition::create('string')
            ->setLabel(t('Last Name'));

        return $properties;
    }

    /**
     * Field type schema definition.
     *
     * Inside this method we defines the database schema used to store data for
     * our field type.
     *
     * Here there is a list of allowed column types: https://goo.gl/YY3G7s
     */
    public static function schema(StorageDefinition $storage)
    {
        $columns = [];
        $columns['first_name'] = [
            'type' => 'char',
            'length' => 255,
        ];
        $columns['last_name'] = [
            'type' => 'char',
            'length' => 255,
        ];

        return [
            'columns' => $columns,
            'indexes' => [],
        ];
    }

    /**
     * Define when the field type is empty.
     *
     * This method is important and used internally by Drupal. Take a moment
     * to define when the field fype must be considered empty.
     */
    public function isEmpty()
    {
        $isEmpty =
            empty($this->get('first_name')->getValue()) &&
            empty($this->get('last_name')->getValue());

        return $isEmpty;
    }
} // class
