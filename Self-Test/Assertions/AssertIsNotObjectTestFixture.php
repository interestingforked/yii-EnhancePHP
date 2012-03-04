<?php
class AssertIsNotObjectTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotObjectWithString()
    {
        $this->target->isNotObject('some string');
    }

    public function assertIsNotObjectWithObject()
    {
        $verifyFailed = false;
        try {
            $object = new EnhancePHPTextFactory();
            $this->target->isNotObject($object);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>