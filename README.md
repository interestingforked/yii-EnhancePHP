Yii Extension - EnhancePHP
=============================

Instalation
------------

1. Copy the extracted files in protected/extensions
2. In protected/tests create a new file boot.php with the following content:

        <?php
        // file boot.php

        $yiit=dirname(__FILE__).'/path/to/yii/yiit.php';
        $config=dirname(__FILE__).'/../config/test.php';

        require_once($yiit);

        Yii::createWebApplication($config);

        ?>

3. Create in protected/tests/unit a new file exp: main.php and add this code:

        <?php

        require_once '/../boot.php';

        Yii::import('ext.EnhancePHP.*');

        // Find the tests - '.' is the current folder
        EnhancePHPCore::discoverTests('.', true, array('Exclusion'));
        // Run the tests
        EnhancePHPCore::runTests();

        ?>

4. Run Tests
Create a simple test in protected/tests/unit folder exp:
        <?php

        //ExempleTest.php file

        class ExempleTest extends EnhancePHPTestFixture {

            public function setUp() {

            }

            public function tearDown() {

            }

            public function add1plus1(){
                $sum = 1 + 1;
                EnhancePHPAssert::areIdentical(2, $sum);
            }

        }

        ?>

and run in CLI
        cd path/to/your/application/protected/tests/unit
        php -f main.php

Basic usage
-----------

        Just replace \Enhance\ with EnhancePHP exp: \Enhance\Core::runTests(); will become EnhancePHPCore::runTests();

Acknowledgement
---------------

        This framework (Enhance PHP Framework) in not written by me, is written by Steve Fenton http://www.enhance-php.com/, i just refactored the
        code to work well with Yii Framework.

Resources 
---------

        Enhance PHP Framework website : http://www.enhance-php.com/


