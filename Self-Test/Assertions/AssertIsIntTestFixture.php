<?php
class AssertIsIntTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsIntWithInt()
    {
        $this->target->isInt(1);
    }

    public function assertIsIntWithFloat()
    {
        $verifyFailed = false;
        try {
            $this->target->isInt(1.1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsIntWithString()
    {
        $verifyFailed = false;
        try {
            $this->target->isInt('1');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>