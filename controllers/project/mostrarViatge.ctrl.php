<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );

class ProjectMostrarViatgeController extends ProjectParentController
{

    public function build()
    {
        $sessio = Session::getInstance()->get('my_name');

        $login = Session::getInstance()->get('login');

        if ($login == TRUE)
        {
            $this->assign('loguejat', $login);
        }

        /**if(empty($sessio) || !isset($sessio))
        {
            header("HTTP/1.1 403 Forbidden");
            header("Location: /login");
            exit();
        }else
        {**/

        $state = Session::getInstance()->get('state');

        if(isset($state))
        {
            Session::getInstance()->delete('state');
        }

        //}
        $info = $this -> getParams();

        if(isset($info['url_arguments'][0]))
        {
            $obj = $this->getClass('MainModel');
            $travel = $obj -> getTravelbyID($info['url_arguments'][0]);
            //var_dump($travel);

            if(!empty($travel) && !isset($info['url_arguments'][1]))
            {
                $this->setLayout('project/mostrarViatge.tpl');
                $user = $obj -> selectUserName($travel[0]['User_id']);
                $this -> assign('user', $user);
                $this -> assign('username', $sessio);
                Session::getInstance()->set('travel_id', $travel[0]['Travel_id']);
                $this -> assign('information', $travel);
                $travel[0]['Hashtags'] = str_replace("#","",$travel[0]['Hashtags']);
                $hash = explode(" ", $travel[0]['Hashtags']);
                $this -> assign('hastags', $hash);
                $haEntrat = 0;

                //Guardem la imatge per a la edicio
                //Session::getInstance()->delete('imageID');
                Session::getInstance()->set('imageID', $info['url_arguments'][0]);

                // Si estem al primer o a l'ultim element hem de canviar on apunten les fletxes
                $id = $info['url_arguments'][0];
                $primerId = $obj -> firstTravel();

                if ($id == $primerId)
                {
                    $ultimId = $obj -> lastTravel();
                    $this -> assign('indexleft', $ultimId);
                    $id = $info['url_arguments'][0];
                    $id = $obj -> nextTravel($id);
                    $this -> assign('indexrigth', $id);
                    $haEntrat = 1;
                }

                $id = $info['url_arguments'][0];
                $ultimId = $obj -> lastTravel();

                if ($id == $ultimId && $haEntrat == 0)
                {
                    $id = $info['url_arguments'][0];
                    $id = $obj -> previousTravel($id);
                    $this -> assign('indexleft', $id);
                    $primerId = $obj -> firstTravel();
                    $this -> assign('indexrigth', $primerId);
                    $haEntrat = 1;
                }

                if ($haEntrat == 0)
                {
                    $id = $info['url_arguments'][0];
                    $id = $obj -> previousTravel($id);
                    $this -> assign('indexleft', $id);
                    $id = $info['url_arguments'][0];
                    $id = $obj -> nextTravel($id);
                    $this -> assign('indexrigth', $id);
                }

                if(Filter::getString('comment'))
                {
                    $name = Session::getInstance()->get('my_name');
                    $id = $obj -> selectUserIDExact($name);
                    $obj->addComment(Filter::getString('comment'), $travel[0]['Travel_id'], $id);
                }
            }
            else
            {
                $this -> setLayout('error/error404.tpl');
            }
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