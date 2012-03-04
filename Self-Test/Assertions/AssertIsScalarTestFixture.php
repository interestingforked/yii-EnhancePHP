<?php
class AssertIsScalarTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsScalarWithInteger()
    {
        $this->target->isScalar(1);
    }

    public function assertIsScalarWithFloat()
    {
        $this->target->isScalar(1.1);
    }

    public function assertIsScalarWithString()
    {
        $this->target->isScalar('xyz');
    }

    public function assertIsScalarWithBool()
    {
        $this->target->isScalar(true);
    }

    public function assertIsScalarWithArray()
    {
        $verifyFailed = false;
        try {
            $array = array();
            $this->target->isScalar($array);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsScalarWithObject()
    {
        $verifyFailed = false;
        try {
            $object = new EnhancePHPTextFactory();
            $this->target->isScalar($object);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>