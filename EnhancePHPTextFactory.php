<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPTextFactory
 *
 * @author User
 */
// Internal Workings
// You don't need to call any of these bits directly - use the public API above, which will
// use the stuff below to carry out your tests!

class EnhancePHPTextFactory {

    public static $Text;

    public static function getLanguageText($language) {
        if (self::$Text === null) {
            $languageClass = 'EnhancePHPText' . $language;
            self::$Text = new $languageClass();
        }
        return self::$Text;
    }

}

?>
