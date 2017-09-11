<?php

class Accessor implements ArrayAccess
{
    private $fallback;
    private $wrapped;

    private static function asArray($input)
    {
        if (!Predicates::isArray($input)) {
            $input = [$input];
        }
        return $input;
    }

    private function __construct($wrapped, $fallback)
    {
        $this->wrapped = $wrapped;
        $this->fallback = $fallback;
    }

    public function notNull($index)
    {
        return Preconditions::checkNotNull($this->optional($index));
    }

    public function notEmpty($index)
    {
        return Preconditions::checkNotEmpty($this->optional($index));
    }

    public function has($index)
    {
        return Predicates::checkNotEmpty($this->optional($index));
    }

    public function required($index)
    {
        return $this->notEmpty($index);
    }

    private static function doGetFrom($object, $index)
    {
        if (is_array($object)) {
          if (array_key_exists($index, $object)) {
              return $object[$index];
          } else {
              return NULL;
          }
        } else {
          if (property_exists($object, $index)) {
              return $object->$index;
          } else {
              return NULL;
          }
        }
    }

    private static function doGet($object, $index, $fallback = NULL)
    {
        $result = self::doGetFrom($object, $index);
        if (Predicates::isNotNull($result)) {
            return $result;
        }
        return Predicates::isNotNull($fallback) ? self::doGetFrom($fallback, $index) : NULL;
    }

    private static function doSet(&$object, $key, $value)
    {
        if (is_array($object)) {
            $object[$key] = $value;
        } else {
            $object->$key = $value;
        }
    }

    public function optional($index, $default = NULL)
    {
        $result = self::doGet($this->wrapped, $index, $this->fallback);
        if (Predicates::isNull($result) || Predicates::isEmpty($result)) {
            return $default;
        } else {
            return $result;
        }
    }

    public function requiredInt($index)
    {
        return intval($this->required($index));
    }

    public function optionalInt($index, $default = 0)
    {
        return intval($this->optional($index, $default));
    }

    public function requiredDouble($index)
    {
        return doubleval($this->required($index));
    }

    public function optionalDouble($index, $default = 0.0)
    {
        return doubleval($this->optional($index, $default));
    }

    private function doCopy($fields, &$to, $accessor, $extraArguments)
    {
        $fields = self::asArray($fields);
        foreach ($fields as $fromField => $toField) {
            if (!Predicates::isString($fromField)) {
                $fromField = $toField;
            }
            self::doSet($to, $toField, call_user_func_array([$this, $accessor], array_merge([$fromField], $extraArguments)));
        }
        return $this;
    }

    public function copyRequired($fields, &$to)
    {
        return $this->doCopy($fields, $to, 'required', []);
    }

    public function copyOptional($fields, &$to, $default = NULL)
    {
        return $this->doCopy($fields, $to, 'optional', [$default]);
    }

    private function doReplicate($fromFields, $toFields, &$to, $required, $default)
    {
        $fromFields = self::asArray($fromFields);
        $toFields = self::asArray($toFields);
        foreach ($fromFields as $fromField) {
            $value = $this->optional($fromField, $default);
            if (Predicates::isNotEmpty($value)) {
                self::replicateOptionalValue($value, $toFields, $to);
                return $this;
            }
        }
        if ($required) {
            throw new InvalidArgumentException('None of input is not empty');
        }
        return $this;
    }

    public function replicateRequired($fromField, $toFields, &$to)
    {
        return $this->doReplicate($fromField, $toFields, $to, true, NULL);
    }

    public function replicateOptional($fromField, $toFields, &$to, $default)
    {
        return $this->doReplicate($fromField, $toFields, $to, false, $default);
    }

    public function replicateEither($fromFields, $toFields, &$to)
    {
        return $this->doReplicate($fromFields, $toFields, $to, true, NULL);
    }

    public function replicateAny($fromFields, $toFields, &$to, $default = NULL)
    {
        return $this->doReplicate($fromFields, $toFields, $to, false, $default);
    }

    public function offsetExists($offset)
    {
        return isset($this->wrapped[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->optional($offset);
    }

    public function offsetSet($offset, $value)
    {
        throw new BadMethodCallException('Updating accessor is prohibited');
    }

    public function offsetUnset($offset)
    {
        throw new BadMethodCallException('Updating accessor is prohibited');
    }

    public function __get($name)
    {
        return $this->optional($name);
    }

    public function __set($name, $value)
    {
        throw new BadMethodCallException('Updating accessor is prohibited');
    }

    public static function copyRequiredBetween($fields, $from, &$to)
    {
        $fields = self::asArray($fields);
        foreach ($fields as $fromField => $toField) {
            if (!Predicates::isString($fromField)) {
                $fromField = $toField;
            }
            self::doSet($to, $toField, Preconditions::checkNotNull(self::doGet($from, $fromField)));
        }
        return $from;
    }

    public static function copyOptionalBetween($fields, $from, &$to)
    {
        $fields = self::asArray($fields);
        foreach ($fields as $fromField => $toField) {
            if (!Predicates::isString($fromField)) {
                $fromField = $toField;
            }
            self::doSet($to, $toField, self::doGet($from, $fromField));
        }
        return $from;
    }

    public static function either(...$maybe)
    {
        return Preconditions::checkNotEmpty(forward_static_call_array(["Accessor", "any"], $maybe));
    }

    public static function any(...$maybe)
    {
        foreach ($maybe as $value) {
            if (Predicates::isNotEmpty($value)) {
                return $value;
            }
        }

        return NULL;
    }

    public static function replicateRequiredValue($value, $toFields, &$to)
    {
        if ($required && Predicates::isEmpty($value)) {
            throw new InvalidArgumentException('None of input is not empty');
        }
        return self::replicateOptionalValue($value, $toFields, $to);
    }

    public static function replicateOptionalValue($value, $toFields, &$to)
    {
        $toFields = self::asArray($toFields);
        foreach ($toFields as $toField) {
            self::doSet($to, $toField, $value);
        }
        return $to;
    }

    public static function replicateEitherValue($values, $toFields, &$to)
    {
        return self::replicateOptionalValue(self::either($values), $toFields, $to);
    }

    public static function replicateAnyValue($values, $toFields, &$to)
    {
        return self::replicateOptionalValue(self::any($values), $toFields, $to);
    }

    public static function copyOptionalValue($values, &$to)
    {
        foreach ($values as $value => $toField) {
            self::doSet($to, $toField, $value);
        }
        return $to;
    }

    public static function wrap($wrapped, $fallback = NULL)
    {
        return new Accessor($wrapped, $fallback);
    }
}

?>
