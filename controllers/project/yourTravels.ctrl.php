<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );


class ProjectYourTravelsController extends ProjectParentController {


    public function build () {

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
                $this->setLayout('project/yourTravels.tpl');

                $id = Session::getInstance()->get('travel_id');
                $this -> assign('id', $id);

                $name = Session::getInstance()->get('my_name');
                $obj = $this->getClass('MainModel');

                $id = $obj -> selectUserIDExact($name);

                $userTravels = $obj -> getUsersTravels($id);
                $longitud = count($userTravels);
                $myArray = array();
                $i=0;

                while($i<$longitud){
                    $travelData['Title'] = $userTravels[$i]['Title'];
                    $travelData['Description'] = $userTravels[$i]['Description'];
                    $travelData['Date'] = $userTravels[$i]['Date'];
                    $travelData['Days'] = $userTravels[$i]['Days'];
                    $travelData['Country'] = $userTravels[$i]['Country'];
                    $travelData['Puntuation'] = $userTravels[$i]['Puntuation'];
                    $travelData['Hashtags'] = $userTravels[$i]['Hashtags'];
                    $travelData['Travel_id'] = $userTravels[$i]['Travel_id'];
                    $travelData['Image'] = $userTravels[$i]['Image'];
                    $myArray[$i] = $travelData;
                    $i=$i+1;
                }

                $this -> assign('travelData',$myArray);
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