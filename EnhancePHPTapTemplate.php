<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPTapTemplate
 *
 * @author User
 */
class EnhancePHPTapTemplate implements EnhancePHPiOutputTemplate {

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
        $passCount = count($results);
        $total = $failCount + $passCount;
        $count = 0;

        $message = '1..' . $total . $this->CR;

        foreach ($errors as $error) {
            ++$count;
            $message .= 'not ok ' . $count . ' ' . $error->Message . $this->CR;
        }

        foreach ($results as $result) {
            ++$count;
            $message .= 'ok ' . $count . ' ' . $result->Message . $this->CR;
        }

        return $message;
    }

}

?>
