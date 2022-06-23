<?php
namespace Unit1\Plugins\Plugin;

use Magento\Theme\Block\Html\Footer;

class AfterFooterPlugin
{
    /**
     * Return new copyright content
     *
     * @param Footer $subject
     * @param array $result
     * @return string
     */
    public function afterGetCopyright(Footer $subject, array $result): string
    {
        return 'Customized copyright!!';
    }
}
