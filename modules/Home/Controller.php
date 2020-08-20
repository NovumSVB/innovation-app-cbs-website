<?php
namespace NovumCbs\Home;

use Core\MainController;
use Core\Translate;

class Controller extends MainController {


	function run()
	{
        $aViewData = [];

	    $aResult['content'] = $this->parse('Home/home.twig', $aViewData);
	    $aResult['title'] = Translate::fromCode("Cbs");
	    return $aResult;
	}

}


