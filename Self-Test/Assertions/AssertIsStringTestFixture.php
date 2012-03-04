<?php
class AssertIsStringTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsStringWithString()
    {
        $this->target->isString('string');
    }

    public function assertIsStringWithInteger()
    {
        $verifyFailed = false;
        try {
            $this->target->isString(1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

}
?>