<?php

class ErrorError403Controller extends Controller
{
	public function build( )
	{
		$this->setLayout( 'error/errorlogin.tpl' );
	}

	public function loadModules()
	{
		$modules['head']	= 'SharedHeadController';
		$modules['footer']	= 'SharedFooterController';

		return $modules;
	}
}

?>