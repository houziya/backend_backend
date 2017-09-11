<?php

class Sharding
{
    private static $classes = [];

    public static function getTableSuffix($id, $type = 0)
    {
        if ($type == 0) {
            $suffix = substr(strval(intval($id / 2)), -2);
            $suffix = str_pad($suffix, 2, '0', STR_PAD_LEFT);
        } else {
            $suffix = substr(strval($id), 0, -2);
        }
        return $suffix;
    }

    public static function join($tableName, $suffix)
    {
        return $tableName . '_' . $suffix;
    }

    public static function getTableName($tableName, $id, $type = 0)
    {
        return self::join($tableName, self::getTableSuffix($id, $type));
    }

    private static function generateClass($className, $tableName)
    {
        $code = 'class ' . $className . ' extends yii\db\ActiveRecord { public static function tableName() { return "'
            . $tableName . '"; } }';
        eval($code);
        return $className;
    }

    public static function create($classNamePrefix, $classNameSuffix, $tableName, $id, $type = 0)
    {
        $suffix = Sharding::getTableSuffix($id, 0);
        $realClassName = $classNamePrefix . $suffix;
        if (Predicates::isNotEmpty($classNameSuffix)) {
            $realClassName .= $classNameSuffix;
        }
        if (!key_exists($realClassName, self::$classes)) {
            $realTableName = Sharding::join($tableName, $suffix);
            $classes[$realClassName] = self::generateClass($realClassName, $realTableName);
        }
        return new $classes[$realClassName];
    }
}

?>
