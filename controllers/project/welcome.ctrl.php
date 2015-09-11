<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );


class ProjectWelcomeController extends ProjectParentController
{
    public function build ()
    {
        $sessio = Session::getInstance()->get('my_name');

        if(!empty($sessio))
        {
            $this->setLayout('error/errorlogin.tpl');
        }
        else
        {
            $info = $this -> getParams();

            if(isset($info['url_arguments'][0]))
            {
                $this->setLayout('error/error404.tpl');
            }
            else
            {
                $s = Session::getInstance()->get('email');

                if(empty($s))
                {
                    $this->setLayout('error/error404.tpl');
                }
                else
                {
                    $this->setLayout('project/welcome.tpl');

                    $u = Session::getInstance()->get('username');
                    $b = Session::getInstance()->get('birth');
                    $e = Session::getInstance()->get('email');
                    $p = Session::getInstance()->get('password');


                    $obj = $this->getClass('MainModel');
                    $obj->insertar($u, $b, $e, $p);

                    $this ->assign('username', $u);

                    Session::getInstance()->delete('username');
                    Session::getInstance()->delete('birth');
                    Session::getInstance()->delete('email');
                    Session::getInstance()->delete('password');
                }
            }
        }
    }

    public function loadModules () {
        $modules['head']    =   'SharedHeadController';
        $modules['footer']  =   'SharedFooterController';
        return $modules;
    }

}