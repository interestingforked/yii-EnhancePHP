<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPTestException
 *
 * @author User
 */
class EnhancePHPTestException extends Exception{

    public function __construct($message = null, $code = 0, Exception $previous = null) {
        parent::__construct($message, $code, $previous);

        $trace = $this->getTrace();

        $this->line = $trace[1]['line'];
        $this->file = $trace[1]['file'];
    }

}

?>
