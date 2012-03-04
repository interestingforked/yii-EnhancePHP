<?php
// Set up the code-coverage reporting
//include('../Code-Spy/codespy.php');
//\codespy\Analyzer::$outputdir = 'C:\Users\Steve Fenton\Documents\_BackedUp\Projects\enhance-php-source\Code-Spy\output';
//\codespy\Analyzer::$outputformat = 'html';
//\codespy\Analyzer::$coveredcolor = '#c2ffc2';

require_once '/../../bootstrap.php';

Yii::import('ext.EnhancePHP.*');

// Find the tests - '.' is the current folder
EnhancePHPCore::discoverTests('.', true, array('Exclusion'));
// Run the tests
EnhancePHPCore::runTests();
?>