<?php

ini_set('error_reporting', (string) E_ALL);
ini_set('display_errors', '1');

class EnhancePHPCore {

    /** @var EnhanceTestFramework $Instance */
    private static $Instance;
    private static $Language = EnhancePHPLanguage::English;

    /** @return Language */
    public static function getLanguage() {
        return self::$Language;
    }

    public static function setLanguage($language) {
        self::$Language = $language;
    }

    public static function discoverTests($path, $isRecursive = true, $excludeRules = array()) {
        self::setInstance();
        self::$Instance->discoverTests($path, $isRecursive, $excludeRules);
    }

    public static function runTests($output = EnhancePHPTemplateType::Cli) {
        self::setInstance();
        self::$Instance->runTests($output);
    }

    public static function getCodeCoverageWrapper($className, $args = null) {
        self::setInstance();
        self::$Instance->registerForCodeCoverage($className);
        return new EnhancePHPCodeCoverageWrapper($className, $args);
    }

    public static function log($className, $methodName) {
        self::setInstance();
        self::$Instance->log($className, $methodName);
    }

    public static function getScenario($className, $args = null) {
        return new EnhancePHPScenario($className, $args, self::$Language);
    }

    public static function setInstance() {
        if (self::$Instance === null) {
            self::$Instance = new EnhancePHPTestFramework(self::$Language);
        }
    }

}

?>
