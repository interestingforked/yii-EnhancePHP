<?php
class ExpectationTestFixture extends EnhancePHPTestFixture
{
    public function expectWithMethodWithReturnsTimes()
    {
        $target = EnhancePHPExpect::method('TestA')->with('A', 'B')->returns('TestC')->times(1);
        
        EnhancePHPAssert::isTrue($target->ExpectArguments);
        EnhancePHPAssert::isTrue($target->ExpectTimes);
        EnhancePHPAssert::areIdentical('A', $target->MethodArguments[0]);
        EnhancePHPAssert::areIdentical('B', $target->MethodArguments[1]);
        EnhancePHPAssert::areIdentical('TestC', $target->ReturnValue);
        EnhancePHPAssert::areIdentical(1, $target->ExpectedCalls);
    }
    
    public function expectWithMethodWithReturns()
    {
        $target = EnhancePHPExpect::method('TestA')->with('A', 'B')->returns('TestC');
        
        EnhancePHPAssert::isTrue($target->ExpectArguments);
        EnhancePHPAssert::isFalse($target->ExpectTimes);
        EnhancePHPAssert::areIdentical('A', $target->MethodArguments[0]);
        EnhancePHPAssert::areIdentical('B', $target->MethodArguments[1]);
        EnhancePHPAssert::areIdentical('TestC', $target->ReturnValue);
        EnhancePHPAssert::areIdentical(-1, $target->ExpectedCalls);
    }
    
    public function expectWithMethodReturnsTimes()
    {
        $target = EnhancePHPExpect::method('TestA')->returns('TestC')->times(1);
        
        EnhancePHPAssert::isFalse($target->ExpectArguments);
        EnhancePHPAssert::isTrue($target->ExpectTimes);
        EnhancePHPAssert::areIdentical('TestC', $target->ReturnValue);
        EnhancePHPAssert::areIdentical(1, $target->ExpectedCalls);
    }
    
    public function expectWithMethodTimes()
    {
        $target = EnhancePHPExpect::method('TestA')->times(1);
        
        EnhancePHPAssert::isFalse($target->ExpectArguments);
        EnhancePHPAssert::isTrue($target->ExpectTimes);
        EnhancePHPAssert::areIdentical(1, $target->ExpectedCalls);
    }
}
?>