<?php
class SomeType
{
    public $value;
}

class AssertIsInstanceOfTypeTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp()
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsInstanceOfTypeWithIdenticalType()
    {
        $object = new SomeType();
        $this->target->isInstanceOfType('SomeType', $object);
    }
    
    public function assertIsInstanceOfTypeWithDifferentTypes()
    {
        $verifyFailed = false;
        $object = new SomeType();
        try {
            $this->target->isInstanceOfType('SomeOtherType', $object);
        } catch (Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>