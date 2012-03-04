<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPiOutputTemplate
 *
 * @author User
 */
interface EnhancePHPiOutputTemplate {

    public function getTemplateType();

    public function get($errors, $results, $text, $duration, $methodCalls);
}

?>
