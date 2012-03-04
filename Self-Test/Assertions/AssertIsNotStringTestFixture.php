<?php
class AssertIsNotStringTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotStringWithInteger()
    {
        $this->target->isNotString(1);
    }

    public function assertIsNotStringWithString()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotString('string');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

}
?>