<?php
class AssertIsNotArrayTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp() 
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotArrayWithString()
    {
        $this->target->isNotArray('array');
    }

    public function assertIsNotArrayWithNumber()
    {
        $array = 500;
        $this->target->isNotArray($array);
    }
    
    public function assertIsNotArrayWithEmptyArray()
    {
        $verifyFailed = false;
        try {
            $array = array();
            $this->target->isNotArray($array);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }

    public function assertIsNotArrayWithArray()
    {
        $verifyFailed = false;
        try {
            $array = array('foo' => 'bar', 12 => true);
            $this->target->isNotArray($array);
        } catch (\Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>