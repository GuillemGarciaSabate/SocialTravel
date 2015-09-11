<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );


class ProjectHomeController extends ProjectParentController
{
    public function build ()
    {
        $this->setLayout('project/home.tpl');

        $info = $this -> getParams();

        if(!isset($info['url_arguments'][0]) || $info['url_arguments'][0] == "logout")
        {
            $sessio = Session::getInstance()->get('my_name');

            if(empty($sessio) || !isset($sessio))
            {
                $s = FALSE;
                Session::getInstance()->set('login', $s);
            }else
            {
                $s = TRUE;
                Session::getInstance()->set('login', $s);
            }

            $info = $this -> getParams();
            if($info['key_main_controller'] == 'home' && isset($info['url_arguments'][0]) && $info['url_arguments'][0] == "logout")
            {
                Session::getInstance()->delete('my_name');
                $s = FALSE;
                Session::getInstance()->set('login', $s);
                header('Location: http://g4.local/');
            }

            $obj = $this->getClass('MainModel');
            $travel = $obj -> getLastTravel();

            $this -> assign('titol', $travel['Title']);
            $this -> assign('image', $travel['Image']);
            $travel['Hashtags'] = str_replace("#","",$travel['Hashtags']);
            $hash = explode(" ", $travel['Hashtags']);
            $this -> assign('hastags', $hash);

            $travel = $obj -> getLast10Travels();
            $this -> assign('lastTen', $travel);
        }
        else
        {
            $this -> setLayout('error/error404.tpl');
        }
    }

    public function loadModules () {
        $modules['head']    =   'SharedHeadController';
        $modules['footer']  =   'SharedFooterController';
        return $modules;
    }
}

?>