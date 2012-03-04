<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPTest
 *
 * @author User
 */
class EnhancePHPTest {

    private $ClassName;
    private $TestName;
    private $TestMethod;
    private $SetUpMethod;
    private $TearDownMethod;
    private $Message;
    private $Line;
    private $File;

    public function __construct($class, $method) {
        $className = get_class($class);
        $this->ClassName = $className;
        $this->TestMethod = array($className, $method);
        $this->SetUpMethod = array($className, 'setUp');
        $this->TearDownMethod = array($className, 'tearDown');
        $this->TestName = $method;
    }

    public function getTestName() {
        return $this->TestName;
    }

    public function getClassName() {
        return $this->ClassName;
    }

    public function getMessage() {
        return $this->Message;
    }

    public function getLine() {
        return $this->Line;
    }

    public function getFile() {
        return $this->File;
    }

    public function run() {
        /** @var $testClass iTestable */
        $testClass = new $this->ClassName();

        try {
            if (is_callable($this->SetUpMethod)) {
                $testClass->setUp();
            }
        } catch (Exception $e) {
            
        }

        try {
            $testClass->{$this->TestName}();
            $result = true;
        } catch (EnhancePHPTestException $e) {
            $this->Message = $e->getMessage();
            $this->Line = $e->getLine();
            $this->File = pathinfo($e->getFile(), PATHINFO_BASENAME);
            $result = false;
        }

        try {
            if (is_callable($this->TearDownMethod)) {
                $testClass->tearDown();
            }
        } catch (Exception $e) {
            
        }

        return $result;
    }

}

?>
