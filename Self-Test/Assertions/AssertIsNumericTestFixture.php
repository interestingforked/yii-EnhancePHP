<?php
class AssertIsNumericTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNumericWithFloat()
    {
        $this->target->isNumeric(1.1);
    }

    public function assertIsNumericWithInt()
    {
        $this->target->isNumeric(1);
    }

    public function assertIsNumericWithNumericString()
    {
        $this->target->isNumeric('1');
    }

    public function assertIsNumericWithNormalString()
    {
        $verifyFailed = false;
        try {
            $this->target->isNumeric('xyz');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>