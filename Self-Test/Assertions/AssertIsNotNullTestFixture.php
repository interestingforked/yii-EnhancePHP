<?php
class AssertIsNotNullTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp()
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNotNullWithNotNull()
    {
        $this->target->isNotNull('');
    }
    
    public function assertIsNotNullWithNull()
    {
        $verifyFailed = false;
        try {
            $this->target->isNotNull(null);
        } catch (Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>