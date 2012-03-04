<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPTemplateFactory
 *
 * @author User
 */
class EnhancePHPTemplateFactory {

    public static function createOutputTemplate($type, $language) {
        switch ($type) {
            case EnhancePHPTemplateType::Xml:
                return new EnhancePHPXmlTemplate($language);
                break;
            case EnhancePHPTemplateType::Html:
                return new EnhancePHPHtmlTemplate($language);
                break;
            case EnhancePHPTemplateType::Cli:
                return new EnhancePHPCliTemplate($language);
                break;
            case EnhancePHPTemplateType::Tap:
                return new EnhancePHPTapTemplate($language);
                break;
        }

        return new EnhancePHPHtmlTemplate($language);
    }

}

?>
