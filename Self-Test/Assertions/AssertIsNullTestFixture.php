<?php
class AssertIsNullTestFixture extends EnhancePHPTestFixture
{
    /** @var EnhancePHPAssertions $target */
    private $target;
    
    public function setUp()
    {
        $this->target = EnhancePHPCore::getCodeCoverageWrapper('EnhancePHPAssertions', array(EnhancePHPLanguage::English));
    }

    public function assertIsNullWithNull()
    {
        $this->target->isNull(null);
    }
    
    public function assertIsNullWithNotNull()
    {
        $verifyFailed = false;
        try {
            $this->target->isNull('');
        } catch (Exception $e) {
            $verifyFailed = true;
        }
        EnhancePHPAssert::isTrue($verifyFailed);
    }
}
?>