<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPCliTemplate
 *
 * @author User
 */
class EnhancePHPCliTemplate implements EnhancePHPiOutputTemplate {

    private $Text;
    private $CR = "\n";

    public function __construct($language) {
        $this->Text = EnhancePHPTextFactory::getLanguageText($language);
    }

    public function getTemplateType() {
        return EnhancePHPTemplateType::Cli;
    }

    public function get($errors, $results, $text, $duration, $methodCalls) {
        $failCount = count($errors);

        $resultMessage = $text->TestPassed . $this->CR;
        if ($failCount > 0) {
            $resultMessage = $text->TestFailed . $this->CR;
        }

        $message = $this->CR .
                $resultMessage .
                $this->CR .
                $this->getBadResults($errors) .
                $this->getGoodResults($results) .
                $this->CR .
                $this->getMethodCoverage($methodCalls) .
                $this->CR .
                $resultMessage .
                str_replace('{0}', $duration, $text->FormatForTestRunTook) . $this->CR;

        return $message;
    }

    public function getBadResults($errors) {
        $message = '';
        foreach ($errors as $error) {
            $message .= $error->Message . $this->CR;
        }
        return $message;
    }

    public function getGoodResults($results) {
        $message = '';
        foreach ($results as $result) {
            $message .= $result->Message . $this->CR;
        }
        return $message;
    }

    public function getMethodCoverage($methodCalls) {
        $message = '';
        foreach ($methodCalls as $key => $value) {
            $message .= str_replace('#', '->', $key) . ':' . $value . $this->CR;
        }
        return $message;
    }

}

?>
