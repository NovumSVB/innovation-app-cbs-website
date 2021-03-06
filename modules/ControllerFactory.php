<?php
namespace NovumCbs;

use _Default\ControllerFactory as _DefaultControllerFactory;
use Core\DeferredAction;
use Core\IControllerFactory;
use Core\MainController;
use Exception\LogicException;

class ControllerFactory extends _DefaultControllerFactory implements IControllerFactory
{
    public function getController(array $aGet, array $aPost, string $sNamespace = null):MainController
    {
        $sRequestUri = $_SERVER['REQUEST_URI'];
        $sRequestUriNoLang = preg_replace('/^\/[a-z]{2}\/?/', '', $sRequestUri);

        $sPreviousPage = DeferredAction::get('current_page');
        if(!empty($sPreviousPage))
        {
            DeferredAction::register('previous_page', $sPreviousPage);
        }

        if(empty($sRequestUriNoLang) || $sRequestUriNoLang == '/')
        {
        	$oController = new \NovumCbs\Home\Controller($aGet, $aPost);
        }

        if(!$oController instanceof MainController)
        {
            throw new LogicException("Controller not found for url ".$_SERVER['REQUEST_URI']);
        }
        return $oController;
    }
}
