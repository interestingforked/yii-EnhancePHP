<?php
class AssertIsNotBoolTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotBoolWithStringTrue()
    {
        $this->target->isNotBool('true');
    }

    public function assertIsNotBoolWithStringFalse()
    {
        $this->target->isNotBool('false');
    }

    public function assertIsNotBoolWithNumber1()
    {
        $this->target->isNotBool(1);
    }

    public function assertIsNotBoolWithNumber0()
    {
        $this->target->isNotBool(0);
    }
    
    public function assertIsNotBoolWithTrue()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotBool(true);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsNotBoolWithFalse()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotBool(false);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>