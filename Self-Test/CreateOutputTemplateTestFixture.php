<?php
class CreateOutputTemplateTestFixture extends EnhancePHPTestFixture
{
    public function createOutputTemplateWithXmlExpectXmlTemplate()
    {
        $output = EnhancePHPTemplateFactory::createOutputTemplate('Xml', EnhancePHPLanguage::English);

        EnhancePHPAssert::areIdentical(EnhancePHPTemplateType::Xml, $output->getTemplateType());
    }    
}
?>