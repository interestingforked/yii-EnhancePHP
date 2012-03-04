<?php
class AssertIsArrayTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsArrayWithEmptyArray()
    {
        $array = array();
        $this->target->isArray($array);
    }

    public function assertIsArrayWithArray()
    {
        $array = array('foo' => 'bar', 12 => true);
        $this->target->isArray($array);
    }
    
    public function assertIsArrayWithString()
    {
        $verifyFailed = false;
        try {
            $this->target->isArray('array');
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsArrayWithNumber()
    {
        $verifyFailed = false;
        try {
            $this->target->isArray(500);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>