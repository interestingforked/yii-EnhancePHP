<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnhancePHPHtmlTemplate
 *
 * @author User
 */
class EnhancePHPHtmlTemplate implements EnhancePHPiOutputTemplate {

    private $Text;

    public function __construct($language) {
        $this->Text = EnhancePHPTextFactory::getLanguageText($language);
    }

    public function getTemplateType() {
        return EnhancePHPTemplateType::Html;
    }

    public function get($errors, $results, $text, $duration, $methodCalls) {
        $message = '';
        $failCount = count($errors);
        $passCount = count($results);
        $methodCallCount = count($methodCalls);

        $currentClass = '';
        if ($failCount > 0) {
            $message .= '<h2 class="error">' . $text->Test . ' ' . $text->Failed . '</h2>';

            $message .= '<ul>';
            foreach ($errors as $error) {
                $testClassName = $error->Test->getClassName();
                if ($testClassName != $currentClass) {
                    if ($currentClass === '') {
                        $message .= '<li>';
                    } else {
                        $message .= '</ul></li><li>';
                    }
                    $message .= '<strong>' . $testClassName . '</strong><ul>';
                    $currentClass = $testClassName;
                }
                $message .= '<li class="error">' . $error->Message . '</li>';
            }
            $message .= '</ul></li></ul>';
        } else {
            $message .= '<h2 class="ok">' . $text->TestPassed . '</h2>';
        }

        $currentClass = '';
        if ($passCount > 0) {
            $message .= '<ul>';
            foreach ($results as $result) {
                $testClassName = $result->Test->getClassName();
                if ($testClassName != $currentClass) {
                    if ($currentClass === '') {
                        $message .= '<li>';
                    } else {
                        $message .= '</ul></li><li>';
                    }
                    $message .= '<strong>' . $testClassName . '</strong><ul>';
                    $currentClass = $testClassName;
                }
                $message .= '<li class="ok">' . $result->Message . '</li>';
            }
            $message .= '</ul></li></ul>';
        }

        $message .= '<h3>' . $text->MethodCoverage . '</h3>';
        if ($methodCallCount > 0) {
            $message .= '<ul>';
            foreach ($methodCalls as $key => $value) {
                $key = str_replace('#', '->', $key);
                if ($value === 0) {
                    $message .= '<li class="error">' . $key . ' ' . $text->Called . ' ' . $value . ' ' .
                            $text->Times . '</li>';
                } else {
                    $message .= '<li class="ok">' . $key . ' ' . $text->Called . ' ' . $value . ' ' .
                            $text->Times . '</li>';
                }
            }
            $message .= '</ul>';
        }

        $message .= '<p>' . str_replace('{0}', $duration, $text->FormatForTestRunTook) . '</p>';

        return $this->getTemplateWithMessage($message);
    }

    private function getTemplateWithMessage($content) {
        return str_replace('{0}', $content, '<!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <title>' . $this->Text->TestResults . '</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="copyright" content="Steve Fenton 2011-Present">
                <meta name="author" content="Steve Fenton">
                <style>
                    article, aside, figure, footer, header, hgroup, nav, section { display: block; clear: both; }

                    body {
                        font-family: "Century Gothic", "Apple Gothic", sans-serif;
                        font-size: 14px;
                        color: Black;
                        margin: 0;
                        padding-bottom: 5em;
                    }
                
                    .error {
                        color: red;
                    }
                    
                    .ok {
                        color: green;
                    }
                </style>
            </head>
            <body>
                <header>
                    <h1>' . $this->Text->EnhanceTestFramework . '</h1>
                </header>
                
                <article id="maincontent">
                    {0}
                </article>
        
                <footer>
                    <p><a href="http://www.enhance-php.com/">' . $this->Text->EnhanceTestFrameworkFull . '</a> ' .
                        $this->Text->Copyright . ' &copy;2011 - ' . date('Y') .
                        ' <a href="http://www.stevefenton.co.uk/">Steve Fenton</a>.</p>
                </footer>
            </body>
        </html>');
    }

}

?>
