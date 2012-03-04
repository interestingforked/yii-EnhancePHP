<?php
class AssertIsNotNumericTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotNumericWithNormalString()
    {
        $this->target->isNotNumeric('xyz');
    }

    public function assertIsNotNumericWithFloat()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotNumeric(1.1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsNotNumericWithInt()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotNumeric(1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsNotNumericWithNumericString()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotNumeric('1');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>