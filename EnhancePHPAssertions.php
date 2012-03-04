<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPAssertions
 *
 * @author User
 */
class EnhancePHPAssertions {

    private $Text;

    public function __construct($language) {
        $this->Text = EnhancePHPTextFactory::getLanguageText($language);
    }

    public function areIdentical($expected, $actual) {
        if (is_float($expected)) {
            if ((string) $expected !== (string) $actual) {
                throw new EnhancePHPTestException(str_replace('{0}', $this->getDescription($expected), str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
            }
        } elseif ($expected !== $actual) {
            throw new EnhancePHPTestException(str_replace('{0}', $this->getDescription($expected), str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function areNotIdentical($expected, $actual) {
        if (is_float($expected)) {
            if ((string) $expected === (string) $actual) {
                throw new EnhancePHPTestException(str_replace('{0}', $this->getDescription($expected), str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
            }
        } elseif ($expected === $actual) {
            throw new EnhancePHPTestException(str_replace('{0}', $this->getDescription($expected), str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isTrue($actual) {
        if ($actual !== true) {
            throw new EnhancePHPTestException(str_replace('{0}', 'true', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isFalse($actual) {
        if ($actual !== false) {
            throw new EnhancePHPTestException(str_replace('{0}', 'false', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function contains($expected, $actual) {
        $result = strpos($actual, $expected);
        if ($result === false) {
            throw new EnhancePHPTestException(str_replace('{0}', $this->getDescription($expected), str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedContainsButWas)), 0);
        }
    }

    public function notContains($expected, $actual) {
        $result = strpos($actual, $expected);
        if ($result !== false) {
            throw new EnhancePHPTestException(str_replace('{0}', $this->getDescription($expected), str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotContainsButWas)), 0);
        }
    }

    public function isNull($actual) {
        if ($actual !== null) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotNull($actual) {
        if ($actual === null) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isArray($actual) {
        if (!is_array($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotArray($actual) {
        if (is_array($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isBool($actual) {
        if (!is_bool($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotBool($actual) {
        if (is_bool($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isFloat($actual) {
        if (!is_float($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotFloat($actual) {
        if (is_float($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isInt($actual) {
        if (!is_int($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotInt($actual) {
        if (is_int($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isNumeric($actual) {
        if (!is_numeric($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotNumeric($actual) {
        if (is_numeric($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isObject($actual) {
        if (!is_object($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotObject($actual) {
        if (is_object($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isResource($actual) {
        if (!is_resource($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotResource($actual) {
        if (is_resource($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isScalar($actual) {
        if (!is_scalar($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotScalar($actual) {
        if (is_scalar($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function isString($actual) {
        if (!is_string($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedButWas)), 0);
        }
    }

    public function isNotString($actual) {
        if (is_string($actual)) {
            throw new EnhancePHPTestException(str_replace('{0}', 'null', str_replace('{1}', $this->getDescription($actual), $this->Text->FormatForExpectedNotButWas)), 0);
        }
    }

    public function fail() {
        throw new EnhancePHPTestException($this->Text->Failed, 0);
    }

    public function inconclusive() {
        throw new EnhancePHPTestException($this->Text->InconclusiveOrNotImplemented, 0);
    }

    public function isInstanceOfType($expected, $actual) {
        $actualType = get_class($actual);
        if ($expected !== $actualType) {
            throw new EnhancePHPTestException(str_replace('{0}', $expected, str_replace('{1}', $actualType, $this->Text->FormatForExpectedButWas)), 0);
        };
    }

    public function isNotInstanceOfType($expected, $actual) {
        $actualType = get_class($actual);
        if ($expected === $actualType) {
            throw new EnhancePHPTestException(str_replace('{0}', $expected, str_replace('{1}', $actualType, $this->Text->FormatForExpectedNotButWas)), 0);
        };
    }

    public function throws($class, $methodName, $args = null) {
        $exception = false;

        try {
            if ($args !== null) {
                /** @noinspection PhpParamsInspection */
                call_user_func_array(array($class, $methodName), $args);
            } else {
                $class->{$methodName}();
            }
        } catch (\Exception $e) {
            $exception = true;
        }

        if (!$exception) {
            throw new EnhancePHPTestException($this->Text->ExpectedExceptionNotThrown, 0);
        }
    }

    private function getDescription($mixed) {
        if (is_object($mixed)) {
            return get_class($mixed);
        } else if (is_bool($mixed)) {
            return $mixed ? 'true' : 'false';
        } else {
            return (string) $mixed;
        }
    }

}

?>
