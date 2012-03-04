<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPTestMessage
 *
 * @author User
 */
class EnhancePHPTestMessage {

    public $Message;
    public $Test;
    public $IsPass;

    public function __construct($message, $test, $isPass) {
        $this->Message = $message;
        $this->Test = $test;
        $this->IsPass = $isPass;
    }

}

?>
