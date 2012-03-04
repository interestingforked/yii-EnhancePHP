<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPExpectation
 *
 * @author User
 */
class EnhancePHPExpectation {

    public $MethodName;
    public $MethodArguments;
    public $ReturnValue;
    public $ReturnException;
    public $ExpectedCalls;
    public $ActualCalls;
    public $ExpectArguments;
    public $ExpectTimes;
    public $Type;
    public $Text;

    public function __construct($language) {
        $this->ExpectedCalls = -1;
        $this->ActualCalls = 0;
        $this->ExpectArguments = false;
        $this->ExpectTimes = false;
        $this->ReturnException = false;
        $this->ReturnValue = null;
        $textFactory = new EnhancePHPTextFactory();
        $this->Text = $textFactory->getLanguageText($language);
    }

    public function method($methodName) {
        $this->Type = 'method';
        $this->MethodName = $methodName;
        return $this;
    }

    public function getProperty($propertyName) {
        $this->Type = 'getProperty';
        $this->MethodName = $propertyName;
        return $this;
    }

    public function setProperty($propertyName) {
        $this->Type = 'setProperty';
        $this->MethodName = $propertyName;
        return $this;
    }

    public function with() {
        $this->ExpectArguments = true;
        $this->MethodArguments = func_get_args();
        return $this;
    }

    public function returns($returnValue) {
        if ($this->ReturnValue !== null) {
            throw new Exception($this->Text->ReturnsOrThrowsNotBoth);
        }
        $this->ReturnValue = $returnValue;
        return $this;
    }

    public function throws($errorMessage) {
        if ($this->ReturnValue !== null) {
            throw new Exception($this->Text->ReturnsOrThrowsNotBoth);
        }
        $this->ReturnValue = $errorMessage;
        $this->ReturnException = true;
        return $this;
    }

    public function times($expectedCalls) {
        $this->ExpectTimes = true;
        $this->ExpectedCalls = $expectedCalls;
        return $this;
    }

    public function verify() {
        $ExpectationMet = true;
        if ($this->ExpectTimes) {
            if ($this->ExpectedCalls !== $this->ActualCalls) {
                $ExpectationMet = false;
            }
        }
        return $ExpectationMet;
    }

}

?>
