<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );



class ProjectSignUpController extends ProjectParentController
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
                $this->setLayout('project/signup.tpl');
                $this->assign('next','/signup');

                if(Filter::getString('username') && Filter::getString('birth') && Filter::getString('email') && Filter::getString('password'))
                {
                    if ($this->checkUsername(Filter::getString('username')) == true &&
                        $this->checkBirth(Filter::getString('birth')) == true &&
                        $this->checkEmail(Filter::getString('email')) == true &&
                        $this->checkPassword(Filter::getString('password')) == true)
                    {
                        //Generem un link aleatori a partir del login de l'usuari
                        $activation = md5(uniqid(Filter::getString('username'), true));
                        $this->assign('activation', $activation);
                        $this->assign('name', Filter::getString('username'));
                        $this->assign('birth', Filter::getString('birth'));
                        $this->assign('email', Filter::getString('email'));
                        $this->assign('password', Filter::getString('password'));

                        //Temporal storage of the user data
                        $userName = Filter::getString('username');
                        $birth = Filter::getString('birth');
                        $email = Filter::getString('email');
                        $password = Filter::getString('password');
                        Session::getInstance()->set('username', $userName);
                        Session::getInstance()->set('birth', $birth);
                        Session::getInstance()->set('email', $email);
                        Session::getInstance()->set('password', $password);
                    }
                    else
                    {
                        $this->assign('name', Filter::getString('username'));
                        $this->assign('birth', Filter::getString('birth'));
                        $this->assign('email', Filter::getString('email'));
                        $this->assign('password', Filter::getString('password'));

                        $this->assign('next', '/signup');
                        $this->setLayout('project/signup.tpl');
                    }
                }
            }
        }
        else
        {
            $this -> setLayout('error/error404.tpl');
        }
    }

    /*public function validator($id, $pwd){
        $obj = $this->getClass('MainModel');
        $usersFound = $obj -> validateUser($id,$pwd);
        if ($usersFound == 1) {
            return true;
        } else {
            return false;
        }
        return true;
    }*/

    public function checkUsername ($username)
    {
        $this->assign('username',$username);
        $obj = $this->getClass('MainModel');
        $usersFound = $obj -> sameName($username);
        $username = str_replace (' ', '', $username);

        if (strlen ($username) >= 4 && $usersFound[0]["found"] == 0) {
            //echo ("true1");
            return true;
        }
        else
        {
            echo ("Username too short or already in use. It must be at least 4 characters long.");
            return false;
        }
    }

    public function checkBirth ($birth)
    {
        $this->assign('title',$birth);
        $dateItem = explode ("/", $birth);
        $numberDateItem = count ($dateItem);

        //Posem la data em format dd-mm-yyyy per poder usar despres la funcio strtotime()
        $data = str_replace("/", "-", $birth);

        if ($numberDateItem == 3 && strlen($dateItem[0]) == 2 && strlen($dateItem[1]) == 2 && strlen($dateItem[2]) == 4 && checkdate ($dateItem[1] , $dateItem[0], $dateItem[2]) == 1 && time() > strtotime('+18 years', strtotime($data))) {
            //echo ("true4");
            return true;
        }
        else
        {
            echo ("Wrong Birth date. Enter a valid one. You must be 18 years old.");
            return false;
        }
    }

    public function checkEmail ($email)
    {
        $this->assign('title',$email);
        $email = (String) $email;
        $obj = $this->getClass('MainModel');
        $emailFound = $obj -> sameEmail($email);

        if ($emailFound[0]["found"] == 0 && !(filter_var($email, FILTER_VALIDATE_EMAIL) === false)) {
            //echo ("true2");
            return true;
        }
        else
        {
            echo ("Wrong email or already in use. Enter a new one.");
            return false;
        }
    }

    public function checkPassword ($password)
    {
        $password = (String) $password;

        if (strlen ($password) >= 6 && strlen ($password) <= 20) {
            //echo ("true3");
            return true;
        } else {
            echo ("Password must be 6 to 20 characters long.");
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