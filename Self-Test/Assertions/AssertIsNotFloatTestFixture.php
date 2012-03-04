<?php
class AssertIsNotFloatTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotFloatWithInteger()
    {
        $this->target->isNotFloat(1);
    }

    public function assertIsNotFloatWithString()
    {
        $this->target->isNotFloat('1.1');
    }

    public function assertIsNotFloatWithFloat()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotFloat(1.1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>