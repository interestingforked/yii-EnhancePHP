<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPCodeCoverageWrapper
 *
 * @author User
 */
class EnhancePHPCodeCoverageWrapper {

    private $Instance;
    private $ClassName;

    public function __construct($className, $args) {
        $this->ClassName = $className;
        if ($args !== null) {
            $rc = new ReflectionClass($className);
            $this->Instance = $rc->newInstanceArgs($args);
        } else {
            $this->Instance = new $className();
        }
        EnhancePHPCore::log($this->ClassName, $className);
        EnhancePHPCore::log($this->ClassName, '__construct');
    }

    public function __call($methodName, $args = null) {
        EnhancePHPCore::log($this->ClassName, $methodName);
        if ($args !== null) {
            /** @noinspection PhpParamsInspection */
            return call_user_func_array(array($this->Instance, $methodName), $args);
        } else {
            return $this->Instance->{$methodName}();
        }
    }

    public function __get($propertyName) {
        return $this->Instance->{$propertyName};
    }

    public function __set($propertyName, $value) {
        $this->Instance->{$propertyName} = $value;
    }

}

?>
