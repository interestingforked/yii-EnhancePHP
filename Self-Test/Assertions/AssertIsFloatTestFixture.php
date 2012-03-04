<?php
class AssertIsFloatTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsFloatWithFloat()
    {
        $this->target->isFloat(1.1);
    }

    public function assertIsFloatWithInteger()
    {
        $verifyFailed = false;
        try {
            $this->target->isFloat(1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsFloatWithString()
    {
        $verifyFailed = false;
        try {
            $this->target->isFloat('1.1');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>