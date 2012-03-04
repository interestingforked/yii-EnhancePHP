<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPMock
 *
 * @author User
 */
class EnhancePHPMock {

    private $IsMock;
    private $Text;
    private $ClassName;
    private $Expectations = array();

    public function __construct($className, $isMock, $language) {
        $this->IsMock = $isMock;
        $this->ClassName = $className;
        $this->Text = EnhancePHPTextFactory::getLanguageText($language);
    }

    public function addExpectation($expectation) {
        $this->Expectations[] = $expectation;
    }

    public function verifyExpectations() {
        if (!$this->IsMock) {
            throw new Exception(
                    $this->ClassName . ': ' . $this->Text->CannotCallVerifyOnStub
            );
        }

        foreach ($this->Expectations as /** @var Expectation $expectation */ $expectation) {
            if (!$expectation->verify()) {
                $Arguments = '';
                if (isset($expectation->MethodArguments)) {
                    foreach ($expectation->MethodArguments as $argument) {
                        if (isset($Arguments[0])) {
                            $Arguments .= ', ';
                        }
                        $Arguments .= $argument;
                    }
                }
                
                throw new Exception(
                        $this->Text->ExpectationFailed . ' ' .
                        $this->ClassName . '->' . $expectation->MethodName . '(' . $Arguments . ') ' .
                        $this->Text->Expected . ' #' . $expectation->ExpectedCalls . ' ' .
                        $this->Text->Called . ' #' . $expectation->ActualCalls, 0);
            }
        }
    }

    public function __call($methodName, $args) {
        return $this->getReturnValue('method', $methodName, $args);
    }

    public function __get($propertyName) {
        return $this->getReturnValue('getProperty', $propertyName, array());
    }

    public function __set($propertyName, $value) {
        $this->getReturnValue('setProperty', $propertyName, array($value));
    }

    private function getReturnValue($type, $methodName, $args) {
        $Expectation = $this->getMatchingExpectation($type, $methodName, $args);
        $Expected = true;
        if ($Expectation === null) {
            $Expected = false;
        }

        if ($Expected) {
            ++$Expectation->ActualCalls;
            if ($Expectation->ReturnException) {
                throw new Exception($Expectation->ReturnValue);
            }
            return $Expectation->ReturnValue;
        }

        if ($this->IsMock) {
            throw new Exception(
                    $this->Text->ExpectationFailed . ' ' .
                    $this->ClassName . '->' . $methodName . '(' . $args . ') ' .
                    $this->Text->Expected . ' #0 ' .
                    $this->Text->Called . ' #1', 0);
        }
        return null;
    }

    private function getMatchingExpectation($type, $methodName, $arguments) {
        foreach ($this->Expectations as $expectation) {
            if ($expectation->Type === $type) {
                if ($expectation->MethodName === $methodName) {
                    $isMatch = true;
                    if ($expectation->ExpectArguments) {
                        $isMatch = $this->argumentsMatch(
                                $expectation->MethodArguments, $arguments
                        );
                    }
                    if ($isMatch) {
                        return $expectation;
                    }
                }
            }
        }
        return null;
    }

    private function argumentsMatch($arguments1, $arguments2) {
        $Count1 = count($arguments1);
        $Count2 = count($arguments2);
        $isMatch = true;
        if ($Count1 === $Count2) {
            for ($i = 0; $i < $Count1; ++$i) {
                if ($arguments1[$i] === EnhancePHPExpect::AnyValue
                        || $arguments2[$i] === EnhancePHPExpect::AnyValue) {
                    // No need to match
                } else {
                    if ($arguments1[$i] !== $arguments2[$i]) {
                        $isMatch = false;
                    }
                }
            }
        } else {
            $isMatch = false;
        }
        return $isMatch;
    }

}

?>
