<?php
class MM_MonacoEditor_Block_Init extends Mage_Core_Block_Template
{
    /**
     * return json encoded array of textareas id and language
     */
    public function getTextAreas(): string
    {
        $textareas = [];
        $controller = Mage::app()->getRequest()->getControllerName();

        $config = Mage::getStoreConfig('cms/mm_monacoeditor/textarea_config');
        if (isset($config[$controller])) {
            $textareas = $config[$controller];
        }

        return Zend_Json::encode(array_values($textareas), false, ['enableJsonExprFinder' => true]);
    }

    public function isWysiwygEnabledByDefault(): bool
    {
        return Mage::getStoreConfig('cms/wysiwyg/enabled') === 'enabled';
    }

    public function getEditorJsUrl(string $fileName = ''): string
    {
        return Mage::getStoreConfig('cms/mm_monacoeditor/editorjs_url_prefix') . $fileName;
    }
}