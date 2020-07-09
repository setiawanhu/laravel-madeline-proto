<?php

namespace Hu\MadelineProto;

use danog\MadelineProto\Logger;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class TelegramObject
 *
 * @package Hu\MadelineProto
 *
 * @property string return_type
 */
class TelegramObject implements Arrayable
{
    /**
     * Contains the Telegram object fields.
     *
     * @var array
     */
    private $fields;

    /**
     * TelegramObject constructor.
     *
     * @param $fields
     */
    public function __construct($fields)
    {
        Logger::log($fields);

        $this->fields = $fields;
    }

    /**
     * Getter magic method.
     *
     * @param $key
     * @return mixed|null
     */
    public function __get($key)
    {
        if ($key === 'return_type') {
            $key = '_';
        }

        return $this->fields[$key] ?? null;
    }

    /**
     * Setter magic method.
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->fields[$name] = $value;
    }

    /**
     * is triggered by calling isset() or empty() on inaccessible members.
     *
     * @param $name string
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->fields[$name]);
    }

    /**
     * @inheritDoc
     */
    public function toArray(): array
    {
        return $this->convertToArray($this->fields);
    }

    /**
     * Convert all objects to array recursively.
     *
     * @param array $fields
     * @return array
     */
    private function convertToArray(array $fields)
    {
        foreach ($fields as $field => &$value) {
            if (is_array($value)) {
                $value = $this->convertToArray($value);
            }

            if ($value instanceof Arrayable) {
                $value = $value->toArray();
            }
        }

        return $fields;
    }
}
