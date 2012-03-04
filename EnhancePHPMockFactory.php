<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPMockFactory
 *
 * @author User
 */
class EnhancePHPMockFactory {

    public static function createMock($typeName) {
        return new EnhancePHPMock($typeName, true, EnhancePHPCore::getLanguage());
    }

}

?>
