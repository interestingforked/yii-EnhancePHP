<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPAssert
 *
 * @author User
 */
class EnhancePHPAssert {

    /** @var Assertions $EnhanceAssertions */
    private static $EnhanceAssertions;

    private static function GetEnhanceAssertionsInstance() {
        if (self::$EnhanceAssertions === null) {
            self::$EnhanceAssertions = new EnhancePHPAssertions(EnhancePHPCore::getLanguage());
        }
        return self::$EnhanceAssertions;
    }

    public static function areIdentical($expected, $actual) {
        self::GetEnhanceAssertionsInstance()->areIdentical($expected, $actual);
    }

    public static function areNotIdentical($expected, $actual) {
        self::GetEnhanceAssertionsInstance()->areNotIdentical($expected, $actual);
    }

    public static function isTrue($actual) {
        self::GetEnhanceAssertionsInstance()->isTrue($actual);
    }

    public static function isFalse($actual) {
        self::GetEnhanceAssertionsInstance()->isFalse($actual);
    }

    public static function isNull($actual) {
        self::GetEnhanceAssertionsInstance()->isNull($actual);
    }

    public static function isNotNull($actual) {
        self::GetEnhanceAssertionsInstance()->isNotNull($actual);
    }

    public static function isArray($actual) {
        self::GetEnhanceAssertionsInstance()->isArray($actual);
    }

    public static function isNotArray($actual) {
        self::GetEnhanceAssertionsInstance()->isNotArray($actual);
    }

    public static function isBool($actual) {
        self::GetEnhanceAssertionsInstance()->isBool($actual);
    }

    public static function isNotBool($actual) {
        self::GetEnhanceAssertionsInstance()->isNotBool($actual);
    }

    public static function isFloat($actual) {
        self::GetEnhanceAssertionsInstance()->isFloat($actual);
    }

    public static function isNotFloat($actual) {
        self::GetEnhanceAssertionsInstance()->isNotFloat($actual);
    }

    public static function isInt($actual) {
        self::GetEnhanceAssertionsInstance()->isInt($actual);
    }

    public static function isNotInt($actual) {
        self::GetEnhanceAssertionsInstance()->isNotInt($actual);
    }

    public static function isNumeric($actual) {
        self::GetEnhanceAssertionsInstance()->isNumeric($actual);
    }

    public static function isNotNumeric($actual) {
        self::GetEnhanceAssertionsInstance()->isNotNumeric($actual);
    }

    public static function isObject($actual) {
        self::GetEnhanceAssertionsInstance()->isObject($actual);
    }

    public static function isNotObject($actual) {
        self::GetEnhanceAssertionsInstance()->isNotObject($actual);
    }

    public static function isResource($actual) {
        self::GetEnhanceAssertionsInstance()->isResource($actual);
    }

    public static function isNotResource($actual) {
        self::GetEnhanceAssertionsInstance()->isNotResource($actual);
    }

    public static function isScalar($actual) {
        self::GetEnhanceAssertionsInstance()->isScalar($actual);
    }

    public static function isNotScalar($actual) {
        self::GetEnhanceAssertionsInstance()->isNotScalar($actual);
    }

    public static function isString($actual) {
        self::GetEnhanceAssertionsInstance()->isString($actual);
    }

    public static function isNotString($actual) {
        self::GetEnhanceAssertionsInstance()->isNotString($actual);
    }

    public static function contains($expected, $actual) {
        self::GetEnhanceAssertionsInstance()->contains($expected, $actual);
    }

    public static function notContains($expected, $actual) {
        self::GetEnhanceAssertionsInstance()->notContains($expected, $actual);
    }

    public static function fail() {
        self::GetEnhanceAssertionsInstance()->fail();
    }

    public static function inconclusive() {
        self::GetEnhanceAssertionsInstance()->inconclusive();
    }

    public static function isInstanceOfType($expected, $actual) {
        self::GetEnhanceAssertionsInstance()->isInstanceOfType($expected, $actual);
    }

    public static function isNotInstanceOfType($expected, $actual) {
        self::GetEnhanceAssertionsInstance()->isNotInstanceOfType($expected, $actual);
    }

    public static function throws($class, $methodName, $args = null) {
        self::GetEnhanceAssertionsInstance()->throws($class, $methodName, $args);
    }

}

?>
