<?php
class AssertIsNotScalarTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotScalarWithArray()
    {
        $array = array();
        $this->target->isNotScalar($array);
    }

    public function assertIsNotScalarWithObject()
    {
        $object = new EnhancePHPTextFactory();
        $this->target->isNotScalar($object);
    }

    public function assertIsNotScalarWithFloat()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotScalar(1.1);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsNotScalarWithString()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotScalar('xyz');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsNotScalarWithBool()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotScalar(true);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>