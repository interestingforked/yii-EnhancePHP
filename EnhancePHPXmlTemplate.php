<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPXmlTemplate
 *
 * @author User
 */
class EnhancePHPXmlTemplate implements EnhancePHPiOutputTemplate {

    private $Text;
    private $Tab = "    ";
    private $CR = "\n";

    public function __construct($language) {
        $this->Text = EnhancePHPTextFactory::getLanguageText($language);
    }

    public function getTemplateType() {
        return EnhancePHPTemplateType::Xml;
    }

    public function get($errors, $results, $text, $duration, $methodCalls) {
        $message = '';
        $failCount = count($errors);

        $message .= '<enhance>' . $this->CR;
        if ($failCount > 0) {
            $message .= $this->getNode(1, 'result', $text->TestFailed);
        } else {
            $message .= $this->getNode(1, 'result', $text->TestPassed);
        }

        $message .= $this->Tab . '<testResults>' . $this->CR .
                $this->getBadResults($errors) .
                $this->getGoodResults($results) .
                $this->Tab . '</testResults>' . $this->CR .
                $this->Tab . '<codeCoverage>' . $this->CR .
                $this->getCodeCoverage($methodCalls) .
                $this->Tab . '</codeCoverage>' . $this->CR;

        $message .= $this->getNode(1, 'testRunDuration', $duration) .
                '</enhance>' . $this->CR;

        return $this->getTemplateWithMessage($message);
    }

    public function getBadResults($errors) {
        $message = '';
        foreach ($errors as $error) {
            $message .= $this->getNode(2, 'fail', $error->Message);
        }
        return $message;
    }

    public function getGoodResults($results) {
        $message = '';
        foreach ($results as $result) {
            $message .= $this->getNode(2, 'pass', $result->Message);
        }
        return $message;
    }

    public function getCodeCoverage($methodCalls) {
        $message = '';
        foreach ($methodCalls as $key => $value) {
            $message .= $this->buildCodeCoverageMessage($key, $value);
        }
        return $message;
    }

    private function buildCodeCoverageMessage($key, $value) {
        return $this->Tab . $this->Tab . '<method>' . $this->CR .
                $this->getNode(3, 'name', str_replace('#', '-&gt;', $key)) .
                $this->getNode(3, 'timesCalled', $value) .
                $this->Tab . $this->Tab . '</method>' . $this->CR;
    }

    private function getNode($tabs, $nodeName, $nodeValue) {
        $node = '';
        for ($i = 0; $i < $tabs; ++$i) {
            $node .= $this->Tab;
        }
        $node .= '<' . $nodeName . '>' . $nodeValue . '</' . $nodeName . '>' . $this->CR;

        return $node;
    }

    private function getTemplateWithMessage($content) {
        return str_replace('{0}', $content, '<?xml version="1.0" encoding="UTF-8" ?>' . "\n" .
                        '{0}');
    }

}

?>
