<?php

class SharedHeadController extends Controller
{
	public function build( )
	{
        $sessio = Session::getInstance()->get('login');
        $user = Session::getInstance()->get('my_name');

        if ($sessio == TRUE)
        {
            $this->assign('loguejat', $sessio);
            $this->assign('user', $user);
        }
        $this->setLayout( 'shared/head.tpl' );
	}
}