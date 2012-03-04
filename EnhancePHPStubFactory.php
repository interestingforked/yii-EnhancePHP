<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPStubFactory
 *
 * @author User
 */
class EnhancePHPStubFactory {

    public static function createStub($typeName) {
        return new EnhancePHPMock($typeName, false, EnhancePHPCore::getLanguage());
    }

}

?>
