<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPScenario
 *
 * @author User
 */
class EnhancePHPScenario {

    private $Text;
    private $Class;
    private $FunctionName;
    private $Inputs = array();
    private $Expectations = array();

    public function __construct($class, $functionName, $language) {
        $this->Class = $class;
        $this->FunctionName = $functionName;
        $this->Text = EnhancePHPTextFactory::getLanguageText($language);
    }

    public function with() {
        $this->Inputs[] = func_get_args();
        return $this;
    }

    public function expect() {
        $this->Expectations[] = func_get_args();
        return $this;
    }

    public function verifyExpectations() {
        if (count($this->Inputs) !== count($this->Expectations)) {
            throw new Exception($this->Text->ScenarioWithExpectMismatch);
        }

        $exceptionText = '';

        while (count($this->Inputs) > 0) {
            $input = array_shift($this->Inputs);
            $expected = array_shift($this->Expectations);
            $expected = $expected[0];

            $actual = call_user_func_array(array($this->Class, $this->FunctionName), $input);

            if (is_float($expected)) {
                if ((string) $expected !== (string) $actual) {
                    $exceptionText .= str_replace('{0}', $expected, str_replace('{1}', $actual, $this->Text->FormatForExpectedButWas));
                }
            } elseif ($expected != $actual) {
                $exceptionText .= str_replace('{0}', $expected, str_replace('{1}', $actual, $this->Text->FormatForExpectedButWas));
            }
        }

        if ($exceptionText !== '') {
            throw new Exception($exceptionText, 0);
        }
    }

}

?>
