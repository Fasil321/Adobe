<?php
namespace Unit1\CustomConfig\Model;

use Magento\Framework\Config\CacheInterface;
use Magento\Framework\Config\ReaderInterface;

class Config extends \Magento\Framework\Config\Data
{
    /**
     * Constructor
     *
     * @param ReaderInterface $reader
     * @param CacheInterface $cache
     * @param string $cacheId
     * phpcs:disable Generic.CodeAnalysis.UselessOverridingMethod
     */
    public function __construct(ReaderInterface $reader, CacheInterface $cache, string $cacheId = '')
    {
        parent::__construct($reader, $cache, $cacheId);
    }
}
