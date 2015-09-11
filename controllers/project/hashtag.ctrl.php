<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );



class ProjectHashtagController extends ProjectParentController {

    public function build ()
    {
        $this -> setLayout('project/hashtag.tpl');

        $info = $this -> getParams();
        $hash = $info['url_arguments'][0];
        $hash = '#'.$hash;
        $this->assign('hashtag', $hash);
        $obj = $this->getClass('MainModel');
        $TravelID = $obj -> getTravelbyHashtag($hash);

        if($info['key_main_controller'] == 'hashtag' && isset($info['url_arguments'][0]) && !isset($info['url_arguments'][1]) && !empty($TravelID))
        {
            //var_dump($TravelID);
            //$index = 0;
            /*foreach($TravelID as $element)
            {
                $result = $obj->getTravelbyID($element);
                $array[$index] = $result;
                $index = $index+1;
            }*/
            for($i=0; $i<(count($TravelID)); $i++)
            {
                $result = $obj->getTravelbyID($TravelID[$i]);
                $array[$i] = $result;
            }
            $this->assign('info',$array);
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