<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );

class ProjectMainController extends ProjectParentController
{
    public function build ()
    {
        $info = $this -> getParams();

        if(!isset($info['url_arguments'][0]))
        {
            $sessio = Session::getInstance()->get('my_name');

            if(!empty($sessio))
            {
                $this->setLayout('error/errorlogin.tpl');
            }
            else
            {
                $this->setLayout('project/main.tpl');
                $s = FALSE;
                Session::getInstance()->set('login', $s);

                if(Filter::getString('usernamelogin') && Filter::getString('passwordlogin'))
                {
                    $var = $this->validator(Filter::getString('usernamelogin'), Filter::getString('passwordlogin'));

                    if ($var == true)
                    {
                        $userName = Filter::getString('usernamelogin');
                        Session::getInstance()->set('my_name', $userName);
                        $s = TRUE;
                        Session::getInstance()->set('login', $s);
                        $this->assign('loguejat', $s);
                        header('Location: http://g4.local/home');
                    }
                    else
                    {
                        $this->assign('errorMessage', "The username or/and password were incorrect, try again");
                        $this->setLayout('project/main.tpl');
                    }
                }
            }
        }
        else
        {
            $this -> setLayout('error/error404.tpl');
        }
    }

    public function validator($id, $pwd)
    {
        $obj = $this->getClass('MainModel');
        $id = (String) $id;
        $pwd = (String) $pwd;
        $usersFound = $obj -> validateUser($id,$pwd);

        if ($usersFound == 1)
        {
            $this->assign('next', '/');
            return true;
        }
        else
        {
            return false;
        }
    }

    public function loadModules () {

        $modules['head']    =   'SharedHeadController';
        $modules['footer']  =   'SharedFooterController';
        return $modules;
    }
}

?>