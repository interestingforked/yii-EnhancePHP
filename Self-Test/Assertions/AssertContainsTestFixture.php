<?php
class AssertContainsTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp()
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertContainsWithStringThatContains()
    {
        $this->target->contains('Test', 'Some Test String');
    }
    
    public function assertContainsWithStringThatEndsWith() 
    {
        $this->target->contains('Test', 'Some Test');
    }
    
    public function assertContainsWithStringThatStartsWith()
    {
        $this->target->contains('Test', 'Test Some String');
    }
    
    public function assertContainsWithStringThatDoesNotContain()
    {
        $verifyFailed = false;
        try {
            $this->target->contains('Test', 'Some Other String');
        } catch (Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>