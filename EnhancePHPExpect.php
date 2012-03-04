<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Expect
 *
 * @author User
 */
class EnhancePHPExpect {
    const AnyValue = 'ENHANCE_ANY_VALUE_WILL_DO';

    public static function method($methodName) {
        $expectation = new EnhancePHPExpectation(EnhancePHPCore::getLanguage());
        return $expectation->method($methodName);
    }

    public static function getProperty($propertyName) {
        $expectation = new EnhancePHPExpectation(EnhancePHPCore::getLanguage());
        return $expectation->getProperty($propertyName);
    }

    public static function setProperty($propertyName) {
        $expectation = new EnhancePHPExpectation(EnhancePHPCore::getLanguage());
        return $expectation->setProperty($propertyName);
    }

}

?>
