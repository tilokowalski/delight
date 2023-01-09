<?php

namespace Delight;

use Delight\Exception\AssertionFailed;

class Assert {

    public static function instanceof($object, $class, ?string $message = null) {
        if (!$object instanceof $class) throw new AssertionFailed($message);
    }

    public static function equals($x, $y, ?string $message = null) {
        if ($x !== $y) throw new AssertionFailed($message);
    }

    public static function not_equals($x, $y, ?string $message = null) {
        if ($x === $y) throw new AssertionFailed($message);
    }

    public static function greater($x, $y, ?string $message = null) {
        if ($x <= $y) throw new AssertionFailed($message);
    }

    public static function less($x, $y, ?string $message = null) {
        if ($x >= $y) throw new AssertionFailed($message);
    }

    public static function greater_equals($x, $y, ?string $message = null) {
        if ($x < $y) throw new AssertionFailed($message);
    }

    public static function less_equals($x, $y, ?string $message = null) {
        if ($x > $y) throw new AssertionFailed($message);
    }

    public static function is_null($x, ?string $message = null) {
        if (null !== $x) throw new AssertionFailed($message);
    }

    public static function not_null($x, ?string $message = null) {
        if (null === $x) throw new AssertionFailed($message);
    }

    public static function in_array($value, $array, ?string $message = null) {
        if (!in_array($value, $array)) throw new AssertionFailed($message);
    }

    public static function array_key_exists($key, $array, ?string $message = null) {
        if (!array_key_exists($key, $array)) throw new AssertionFailed($message);
    }

    public static function file_exists($path, ?string $message = null) {
        if (!file_exists($path)) throw new AssertionFailed($message);
    }

    public static function is_true($condition, ?string $message = null) {
        if (!$condition) throw new AssertionFailed($message); 
    }

    public static function is_false($condition, ?string $message = null) {
        if ($condition) throw new AssertionFailed($message); 
    }

    public static function mime_content_type($path, $type, ?string $message = null) {
        self::file_exists($path);
        if (!str_contains(mime_content_type($path), $type)) throw new AssertionFailed($message); 
    }

}
