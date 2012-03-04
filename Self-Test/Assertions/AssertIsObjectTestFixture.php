<?php
class AssertIsObjectTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsObjectWithObject()
    {
        $object = new EnhancePHPTextFactory();
        $this->target->isObject($object);
    }

    public function assertIsObjectWithString()
    {
        $verifyFailed = false;
        try {
            $this->target->isObject('some string');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>