<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );


class ProjectYourCommentsController extends ProjectParentController
{
    public function build ()
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

            if(!isset($info['url_arguments'][0]))
            {
                $this->setLayout('project/yourComments.tpl');

                $id = Session::getInstance()->get('travel_id');
                $this -> assign('id', $id);

                $name = Session::getInstance()->get('my_name');
                $obj = $this->getClass('MainModel');

                $id = $obj -> selectUserIDExact($name);

                $userComment = $obj -> getCommentsbyID($id);
                $longitud = count($userComment);
                $i=0;

                while($i<$longitud){

                    $travelData[$i] = $obj -> getTravelbyID($userComment[$i]['Travel']);
                    $travelData[$i][0]['Comment'] = $userComment[$i]['Comment'];
                    $i=$i+1;

                }
                $this -> assign('travelData',$travelData);
            }
            else
            {
                $this->setLayout('error/error404.tpl');
            }
        }
    }

    public function loadModules () {
        $modules['head']    =   'SharedHeadController';
        $modules['footer']  =   'SharedFooterController';
        return $modules;
    }

}