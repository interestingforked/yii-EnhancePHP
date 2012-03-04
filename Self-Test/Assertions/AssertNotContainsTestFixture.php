<?php
class AssertNotContainsTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp()
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }
    
    public function assertNotContainsWithStringThatContains() 
    {
        $verifyFailed = false;
        try {
            $this->target->notContains('Test', 'Some Test String');
        } catch (Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
    
    public function assertNotContainsWithStringThatEndsWith()
    {
        $verifyFailed = false;
        try {
            $this->target->notContains('Test', 'Some Test');
        } catch (Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
    
    public function assertNotContainsWithStringThatStartsWith()
    {
        $verifyFailed = false;
        try {
            $this->target->notContains('Test', 'Test Some String');
        } catch (Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
    
    public function assertNotContainsWithStringThatDoesNotContain()
    {
        $this->target->notContains('Test', 'Some Other String');
    }
}
?>