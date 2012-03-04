<?php
class EnhanceOutputTemplateFactoryTestFixture extends EnhancePHPTestFixture
{
    public function createOutputTemplateWithXmlExpectXmlTemplate()
    {
        $output = EnhancePHPTemplateFactory::CreateOutputTemplate(EnhancePHPTemplateType::Xml, EnhancePHPLanguage::English);

        EnhancePHPAssert::areIdentical(EnhancePHPTemplateType::Xml, $output->GetTemplateType());
    }    

    public function createOutputTemplateWithHtmlExpectHtmlTemplate()
    {
        $output = EnhancePHPTemplateFactory::CreateOutputTemplate(EnhancePHPTemplateType::Html, EnhancePHPLanguage::English);

        EnhancePHPAssert::areIdentical(EnhancePHPTemplateType::Html, $output->GetTemplateType());
    }    

    public function createOutputTemplateWithCliExpectCliTemplate()
    {
        $output = EnhancePHPTemplateFactory::CreateOutputTemplate(EnhancePHPTemplateType::Cli, EnhancePHPLanguage::English);

        EnhancePHPAssert::areIdentical(EnhancePHPTemplateType::Cli, $output->GetTemplateType());
    }    
}
?>
