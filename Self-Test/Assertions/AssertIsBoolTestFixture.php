<?php
class AssertIsBoolTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsBoolWithTrue()
    {
        $this->target->isBool(true);
    }

    public function assertIsBoolWithFalse()
    {
        $this->target->isBool(false);
    }
    
    public function assertIsBoolWithStringTrue()
    {
        $verifyFailed = false;
        try {
            $this->target->isBool('true');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsBoolWithStringFalse()
    {
        $verifyFailed = false;
        try {
            $this->target->isBool('false');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsArrayWithNumber1()
    {
        $verifyFailed = false;
        try {
            $this->target->isBool(1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsArrayWithNumber0()
    {
        $verifyFailed = false;
        try {
            $this->target->isBool(0);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>