<?php

class Preconditions
{
    public static function checkArgument($arg, $message = null)
    {
        if ($arg) {
            return $arg;
        }
        throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . "' is not true"));
    }

    public static function checkNull($arg, $message = null)
    {
        if (Predicates::isNotNull($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . "' is not null"));
        }
        return $arg;
    }

    public static function checkNotNull($arg, $message = null)
    {
        if (Predicates::isNull($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, 'Argument is null'));
        }
        return $arg;
    }

    public static function checkEmpty($arg, $message = null)
    {
        if (Predicates::isNotEmpty($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . "'is not empty"));
        }
        return $arg;
    }

    public static function checkNotEmpty($arg, $message = null)
    {
        if (Predicates::isEmpty($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . "' is empty"));
        }
        return $arg;
    }

    public static function checkLength($arg, $maxLength, $minLength = 0)
    {
        if (!is_string($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . "' is not a string"));
        }
        $len = strlen($arg);
        if ($len > $maxLength) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . "' is longer than " . $maxLength));
        }
        if ($len < $minLength) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . "' is shorter than " . $minLength));
        }
        return $arg;
    }

    public static function checkNotNegative($arg, $message = null)
    {
        if (!Predicates::isNotNegative($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . " is a negative number"));
        }
        return $arg;
    }

    public static function checkNegative($arg, $message = null)
    {
        if (Predicates::isNotNegative($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . " is not a negative number"));
        }
        return $arg;
    }

    public static function checkNotPositive($arg, $message = null)
    {
        if (!Predicates::isNotPositive($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . " is a negative number"));
        }
        return $arg;
    }

    public static function checkPositive($arg, $message = null)
    {
        if (Predicates::isNotPositive($arg)) {
            throw new InvalidArgumentException(Accessor::either($message, "Argument '" . json_encode($arg) . " is not a positive number"));
        }
        return $arg;
    }
}

?>
