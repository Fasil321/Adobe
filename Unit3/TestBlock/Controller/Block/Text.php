<?php
namespace Unit3\TestBlock\Controller\Block;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Result\PageFactory;

class Text extends Action
{
    /**
     * @var PageFactory
     **/

    protected $_pageFactory;
    /**
     * Text constructor.
     *
     * @param Context $context
     * @param PageFactory $pageFactory
     **/

    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * Return content from block
     *
     * @return ResultInterface
     */

    public function execute(): ResultInterface
    {
        $block = $this->_pageFactory->create()->getLayout()->createBlock(Magento\Framework\View\Element\Text::class);
        $block->setText("Hello World From a New Module!");
        $result = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_RAW);
        $result->setContents($block->toHtml());
        return $result;
    }
}
