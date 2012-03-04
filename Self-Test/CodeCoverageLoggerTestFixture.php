<?php
class TestClassForCodeCoverageLogger
{
    public $property = 1;
    
    public function getNumberPlusTwo($number)
    {
        return $number + 2;
    }
}

class CodeCoverageLoggerTestFixture extends EnhancePHPTestFixture
{
    public function useCodeCoverageLoggerToCallMethod()
    {
        /** @var TestClassForCodeCoverageLogger $target */
        $target = EnhancePHPCore::getCodeCoverageWrapper('TestClassForCodeCoverageLogger');
        
        $result = $target->getNumberPlusTwo(5);
        
        EnhancePHPAssert::areIdentical(7, $result);
    }
    
    public function useCodeCoverageLoggerToGetProperty()
    {
        /** @var TestClassForCodeCoverageLogger $target */
        $target = EnhancePHPCore::getCodeCoverageWrapper('TestClassForCodeCoverageLogger');
        
        $result = $target->property;
        
        EnhancePHPAssert::areIdentical(1, $result);
    }
    
    public function useCodeCoverageLoggerToSetProperty() 
    {
        /** @var TestClassForCodeCoverageLogger $target */
        $target = EnhancePHPCore::getCodeCoverageWrapper('TestClassForCodeCoverageLogger');
        
        $target->property = 8;
        $result = $target->property;
        
        EnhancePHPAssert::areIdentical(8, $result);
    }
}
?>