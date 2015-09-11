<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );

class ProjectFollowController extends ProjectParentController
{
    public function build()
    {
        $sessio = Session::getInstance()->get('my_name');

        if(empty($sessio) || !isset($sessio))
        {
            header("HTTP/1.1 403 Forbidden");
            $this->setLayout('error/error403.tpl');
        }
        else
        {
            $info = $this -> getParams();

            if(!isset($info['url_arguments'][0]) || $info['url_arguments'][0] == 'user' || $info['url_arguments'][0] == 'country' || $info['url_arguments'][0] == 'unfollow')
            {
                $this->setLayout('project/follow.tpl');
                $obj = $this->getClass('MainModel');
                $userID = $obj -> selectUserIDExact($sessio);
                $obj = $this->getClass('MainModel');
                $followedPeople = $obj -> selectFollowers($userID);

                if (empty($followedPeople))
                {
                    $this -> assign('buit', TRUE);
                }
                $this -> assign('followed', $followedPeople);

                $info = $this -> getParams();

                //Quan el tio vol deixar de seguir a un altre
                if($info['key_main_controller'] == 'follow' && isset($info['url_arguments'][0]) && $info['url_arguments'][0] == "unfollow" && isset($info['url_arguments'][1]))
                {
                    $userName = $info['url_arguments'][1];
                    $followedID = $obj -> selectUserIDExact($userName);
                    $obj -> deleteFollow($userID, $followedID);
                    header('Location: http://g4.local/follow');
                }

                //Quan un tio vol seguir a un altre per nom de usuari
                if($info['key_main_controller'] == 'follow' && isset($info['url_arguments'][0]) && $info['url_arguments'][0] == "user" && isset($info['url_arguments'][1]))
                {
                    $userName = $info['url_arguments'][1];
                    $followedID = $obj -> selectUserIDExact($userName);
                    $obj -> insertFollow($userID, $sessio, $followedID, $userName);
                    header('Location: http://g4.local/follow');
                }

                //Quan el tio esta fent una cerca de usuaris per nom
                if($info['key_main_controller'] == 'follow' && isset($info['url_arguments'][0]) && $info['url_arguments'][0] == "user")
                {
                    $nametoSearch = Filter::getString('peopletofollow');
                    $foundUsers = $obj-> selectUserToFollow($nametoSearch);

                    if(empty($foundUsers))
                    {
                        $this -> assign('notfoundUsers', 'There is not any user with this name');
                    }
                    else
                    {
                        $myarray=array();

                        for ($i = 0; $i < count($foundUsers); $i++)
                        {
                            $name = $obj -> selectUserName($foundUsers[$i]['id']);
                            $myarray[$i] = $name;
                        }
                        $myarray = array_unique($myarray);
                        $this -> assign('foundUsers', $myarray);
                    }
                }

                //Quan el tio esta fent una cerca de usuaris per pais
                if($info['key_main_controller'] == 'follow' && isset($info['url_arguments'][0]) && $info['url_arguments'][0] == "country")
                {
                    $countrytoSearch = Filter::getString('peopletofollow');
                    $foundUsers = $obj-> selectUserbyCountry($countrytoSearch);

                    if(empty($foundUsers))
                    {
                        $this -> assign('notfoundUsers', 'No users in this country!');
                    }
                    else
                    {
                        /*for ($i = 0; $i < count($foundUsers); $i++)
                        {

                            $name = $obj -> selectUserName($foundUsers[$i]['id']);
                            $myarray[$i] = $name;

                        }*/
                        $foundUsers = array_unique($foundUsers);
                        $this -> assign('foundUsers', $foundUsers);
                    }
                }
            }
            else
            {
                $this -> setLayout('error/error404.tpl');
            }
        }
    }

    public function loadModules () {
        $modules['head']    =   'SharedHeadController';
        $modules['footer']  =   'SharedFooterController';
        return $modules;
    }
}

?>