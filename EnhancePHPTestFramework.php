<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPTestFramework
 *
 * @author User
 */
class EnhancePHPTestFramework {
 private $FileSystem;
    private $Text;
    private $Tests = array();
    private $Results = array();
    private $Errors = array();
    private $Duration;
    private $MethodCalls = array();
    private $Language;

    public function __construct($language)
    {
        $this->Text = EnhancePHPTextFactory::getLanguageText($language);
        $this->FileSystem = new EnhancePHPFileSystem();
        $this->Language = $language;
    }

    public function discoverTests($path, $isRecursive, $excludeRules)
    {
        $directory = rtrim($path, '/');
        if (is_dir($directory)) {
            $phpFiles = $this->FileSystem->getFilesFromDirectory($directory, $isRecursive, $excludeRules);
            foreach ($phpFiles as $file) {
                /** @noinspection PhpIncludeInspection */
                include_once($file);
            }
        }
    }

    public function runTests($output)
    {
        $this->getTestFixturesByParent();
        $this->run();

        if(PHP_SAPI === 'cli' && $output != EnhancePHPTemplateType::Tap) {
            $output = EnhancePHPTemplateType::Cli;
        }

        $OutputTemplate = EnhancePHPTemplateFactory::createOutputTemplate($output, $this->Language);
        echo $OutputTemplate->get(
            $this->Errors,
            $this->Results,
            $this->Text,
            $this->Duration,
            $this->MethodCalls
        );

        if (count($this->Errors) > 0) {
            exit(1);
        } else {
            exit(0);
        }
    }

    public function log($className, $methodName)
    {
        $index = $this->getMethodIndex($className, $methodName);
        if (array_key_exists($index ,$this->MethodCalls)) {
            $this->MethodCalls[$index] = $this->MethodCalls[$index] + 1;
        }
    }

    public function registerForCodeCoverage($className)
    {
        $classMethods = get_class_methods($className);
        foreach($classMethods as $methodName) {
            $index = $this->getMethodIndex($className, $methodName);
            if (!array_key_exists($index ,$this->MethodCalls)) {
                $this->MethodCalls[$index] = 0;
            }
        }
    }

    private function getMethodIndex($className, $methodName)
    {
        return $className . '#' . $methodName;
    }

    private function getTestFixturesByParent()
    {
        $classes = get_declared_classes();
        foreach($classes as $className) {
            $this->AddClassIfTest($className);
        }
    }

    private function AddClassIfTest($className)
    {
        $parentClassName = get_parent_class($className);
        if ($parentClassName === 'EnhancePHPTestFixture') {
            $instance = new $className();
            $this->addFixture($instance);
        } else {
            $ancestorClassName = get_parent_class($parentClassName);
            if ($ancestorClassName === 'EnhancePHPTestFixture') {
                $instance = new $className();
                $this->addFixture($instance);
            }
        }
    }

    private function addFixture($class)
    {
        $classMethods = get_class_methods($class);
        foreach($classMethods as $method) {
            if (strtolower($method) !== 'setup' && strtolower($method) !== 'teardown') {
                $reflection = new ReflectionMethod($class, $method);
                if ($reflection->isPublic()) {
                    $this->addTest($class, $method);
                }
            }
        }
    }

    private function addTest($class, $method)
    {
        $testMethod = new EnhancePHPTest($class, $method);
        $this->Tests[] = $testMethod;
    }

    private function run()
    {
        $start = time();
        foreach($this->Tests as /** @var Test $test */ $test) {
            $result = $test->run();
            if ($result) {
                $message = $test->getTestName() . ' - ' . $this->Text->Passed;
                $this->Results[] = new EnhancePHPTestMessage($message, $test, true);
            } else {
                $message = '['. str_replace('{0}', $test->getLine(), str_replace('{1}', $test->getFile(), $this->Text->LineFile)) . '] ' .
                    $test->getTestName() . ' - ' .
                    $this->Text->Failed . ' - ' . $test->getMessage();
                $this->Errors[] = new EnhancePHPTestMessage($message, $test, false);
            }
        }
        $this->Duration = time() - $start;
    }
}

?>
