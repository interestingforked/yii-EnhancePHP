<?php
class AssertIsNotIntTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotIntWithFloat()
    {
        $this->target->isNotInt(1.1);
    }

    public function assertIsNotIntWithString()
    {
        $this->target->isNotInt('1');
    }

    public function assertIsNotIntWithInt()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotInt(1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>