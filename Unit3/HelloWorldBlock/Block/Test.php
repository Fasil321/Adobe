<?php
namespace Unit3\HelloWorldBlock\Block;

/**
 * This class describes a test.
 */
class Test extends \Magento\Framework\View\Element\AbstractBlock
{
    /**
     * Returns a html representation of the object.
     *
     * @return     string  Html representation of the object.
     */
    protected function _toHtml(): string
    {
        return "<b>Hello world from the block!</b>";
    }
}
