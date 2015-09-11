<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );



class ProjectCommentController extends ProjectParentController
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

            if(isset($info['url_arguments'][0]))
            {
                $obj = $this->getClass('MainModel');
                $travel = $obj->getTravelbyID($info['url_arguments'][0]);
                //var_dump($travel);

                if(!empty($travel) && !isset($info['url_arguments'][1]))
                {
                    $this->setLayout('project/comment.tpl');
                    $id = Session::getInstance()->get('travel_id');
                    $this -> assign('id', $id);
                }
                else
                {
                    $this->setLayout('error/error404.tpl');
                }
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

?>