<?php

class MM_MonacoEditor_Block_Init extends Mage_Core_Block_Template
{
    /**
     * return json encoded array of textareas id and language
     */
    public function getTextAreas(): ?string
    {
        $controller = Mage::app()->getRequest()->getControllerName();

        $config = Mage::getStoreConfig('cms/mm_monacoeditor/textarea_config');
        if (! isset($config[$controller])) {
            return null;
        }

        return Zend_Json::encode(array_values($config[$controller]), false, ['enableJsonExprFinder' => true]);
    }

    public function isWysiwygEnabledByDefault(): bool
    {
        return Mage::getStoreConfig('cms/wysiwyg/enabled') === Mage_Cms_Model_Wysiwyg_Config::WYSIWYG_ENABLED;
    }

    public function getEditorJsUrl(string $fileName = ''): string
    {
        return Mage::getStoreConfig('cms/mm_monacoeditor/editorjs_url_prefix') . $fileName;
    }
}