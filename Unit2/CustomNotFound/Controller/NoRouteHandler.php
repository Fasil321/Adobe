<?php
namespace Unit2\CustomNotFound\Controller;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Router\NoRouteHandlerInterface;

class NoRouteHandler implements NoRouteHandlerInterface
{
    /**
     * Forward controller action
     *
     * @param RequestInterface $request
     * @return bool
     */
    public function process(RequestInterface $request): bool
    {
        if ($request->getFrontName() == "admin") {
            return false;
        }
        $moduleName = 'cms';
        $controllerName = 'index';
        $actionName = 'index';
        $request ->setModuleName($moduleName) ->setControllerName($controllerName) ->setActionName($actionName);
        return true;
    }
}
