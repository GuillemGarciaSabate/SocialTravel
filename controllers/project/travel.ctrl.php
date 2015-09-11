<?php

include_once( PATH_CONTROLLERS . 'project/parent.ctrl.php' );


class ProjectTravelController extends ProjectParentController {


    public function build () {
        $this->assign('next','/travel');
        $sessio = Session::getInstance()->get('my_name');

        if(empty($sessio) || !isset($sessio))
        {
            header("HTTP/1.1 403 Forbidden");
            $this->setLayout('error/error403.tpl');
        }else
        {
            $this->setLayout('project/travel.tpl');
            $state = Session::getInstance()->get('state');
            if(empty($state) || !isset($state))
            {
                Session::getInstance()->set('state', 'other');
                //echo 'other';
            }
        }

        $info = $this -> getParams();
        if($info['key_main_controller'] == 'travel' && isset($info['url_arguments'][0]) && $info['url_arguments'][0] == "delete" && !isset($info['url_arguments'][1]))
        {
            $v = Session::getInstance()->get('travel_id');
            $obj = $this->getClass('MainModel');
            $obj -> deleteTravel($v);
            $obj -> deleteComentwithTravelId($v);
            header('Location: http://g4.local/');
        }
        if($info['key_main_controller'] == 'travel' && isset($info['url_arguments'][0]) && $info['url_arguments'][0] == "edit" && !isset($info['url_arguments'][1]))
        {

            $v = Session::getInstance()->get('travel_id');
            $obj = $this->getClass('MainModel');
            $travel = $obj -> getTravelbyID($v);

            $this->assign('title',$travel[0]['Title']);
            $this->assign('desc',$travel[0]['Description']);
            $this->assign('coun',$travel[0]['Country']);
            $this->assign('depart',$travel[0]['Date']);
            $this->assign('dur',$travel[0]['Days']);
            $this->assign('punt',$travel[0]['Puntuation']);
            $this->assign('hash',$travel[0]['Hashtags']);

            $imageID = Session::getInstance()->get('imageID');
            $ID = $obj -> imageLIKE($imageID);
            $this -> assign('id',$ID[0]["Image"]);
            //Session::getInstance()->delete('imageID');

            Session::getInstance()->set('state', 'edit');
            $state = Session::getInstance()->get('state');

        }

        if(Filter::getString('title') && Filter::getString('description') && Filter::getString('date') && Filter::getString('country')
            && Filter::getString('duration') && Filter::getString('puntuation') && Filter::getString('hashtags')){
            if ($this->checkTitle (Filter::getString('title')) == true &
                $this->checkDescription (Filter::getString('description')) == true &
                $this->checkDate (Filter::getString('date')) == true &
                $this->checkCountry (Filter::getString('country')) == true &
                $this->checkDuration (Filter::getString('duration')) == true &
                $this->checkPuntuation (Filter::getString('puntuation')) == true &
                $this->checkHashtags (Filter::getString('hashtags')) == true)
            {
                $sessio = Session::getInstance()->get('my_name');
                $state = Session::getInstance()->get('state');
                $state = (String) $state;


                $obj = $this->getClass('MainModel');

                if($state == 'edit')
                {
                    $travel_id = Session::getInstance()->get('travel_id');
                    //$userId = $obj -> selectUserID($sessio);

                    $photo2upload= false;

                    if(isset($_FILES['image']))
                    {
                        $photo2upload = $_FILES['image'];

                    }

                    $paraules = explode ('/', $_FILES["image"]["type"]);
                    if((empty($paraules[1])) || (($paraules[1] != "gif") && ($paraules[1] != "jpg") && ($paraules[1] != "jpeg") && ($paraules[1] != "png")))
                    {
                        echo "Not a gif/jpg/png image";
                    }
                    else
                    {
                        if(2000000>filesize($_FILES['image']['tmp_name']))
                        {
                            $photo = $travel_id.'.'.pathinfo($_FILES["image"]['name'], PATHINFO_EXTENSION);
                            $path = PATH_HTDOCS.'imag/'.$photo;
                            $objImg = $this->getClass('images');
<<<<<<< HEAD

                            if(file_exists('imag/'.$travel_id.'.jpg') || file_exists('imag/'.$travel_id.'.png'))
                            {
                                if(file_exists('imag/'.$travel_id.'.jpg')){
                                    unlink('imag/'.$travel_id.'.jpg');
                                }
                                if(file_exists('imag/'.$travel_id.'.png')){
                                    unlink('imag/'.$travel_id.'.png');
                                }
                            }

                            $objImg -> uploadResizeAndSave($_FILES["image"], $path, 400, 300);

                            $obj->updateTravel($travel_id, Filter::getString('title'), Filter::getString('description'), Filter::getString('date'), Filter::getString('duration'),
=======

                            if(file_exists('imag/'.$travel_id.'.jpg') || file_exists('imag/'.$travel_id.'.png'))
                            {
                                if(file_exists('imag/'.$travel_id.'.jpg')){
                                    unlink('imag/'.$travel_id.'.jpg');
                                }
                                if(file_exists('imag/'.$travel_id.'.png')){
                                    unlink('imag/'.$travel_id.'.png');
                                }
                            }

                            $objImg -> uploadResizeAndSave($_FILES["image"], $path, 400, 300);
                            $description = str_replace("'", "", Filter::getString('description'));
                            $obj->updateTravel($travel_id, Filter::getString('title'), $description, Filter::getString('date'), Filter::getString('duration'),
>>>>>>> b947355a4bc58bb52efbd7eb67b7129e85f85962
                                $photo, Filter::getString('country'), Filter::getString('puntuation'), Filter::getString('hashtags'));
                            //Session::getInstance()->delete('state');

                            header('Location: http://g4.local/mostrarViatge/'.$travel_id);
                        }
                        else
                        {
                            echo "Image must be less than 2Mb";
                        }

                    }


                    //Recollir la imatge
                    /*if(isset($_FILES['image']))
                        $photo2upload = $_FILES['image'];*/


                }
                else
                {
                    $photo2upload= false;

                    //Recollir la imatge
                    if(isset($_FILES['image']))
                    {
                        $photo2upload = $_FILES['image'];
                    }


                    //$paraules = array();
                    $paraules = explode ('/', $_FILES["image"]["type"]);


                    if((empty($paraules[1])) || (($paraules[1] != "gif") && ($paraules[1] != "jpg") && ($paraules[1] != "jpeg") && ($paraules[1] != "png")))
                    {
                        echo "Not a gif/jpg/png";
                    }
                    else
                    {
                        if(2000000>filesize($_FILES['image']['tmp_name']))
                        {
                            $aux = $obj -> getLastTravel();
                            $id = $aux['Travel_id']+1;
                            $photo = $id.'.'.pathinfo($_FILES["image"]['name'], PATHINFO_EXTENSION);
                            $path = PATH_HTDOCS.'imag/'.$photo;
                            $objImg = $this->getClass('images');
                            $objImg -> uploadResizeAndSave($_FILES["image"], $path, 400, 300);

                            //Recollir userid
                            $userId = $obj -> selectUserIDExact($sessio);
                            unset($_FILES['image']);
                            $description = str_replace("'", "", Filter::getString('description'));
                            $obj->insertarViatge($userId,Filter::getString('title'), $description, Filter::getString('date'), $photo,
                                Filter::getString('country'), Filter::getString('duration'), Filter::getString('puntuation'), Filter::getString('hashtags'));
                            $lastID = $obj->getLastTravel();
                            header('Location: http://g4.local/mostrarViatge/'.$lastID['Travel_id']);
                        }
                        else
                        {
                            echo "Image must be less than 2Mb";
                        }
                    }
                    //Recollir la imatge
                    /*if(isset($_FILES["image"]))
                    {
                        //$photo2upload = $_FILES["image"];
                        var_dump($_FILES);
                        echo '<br>';
                        //var_dump($photo2upload);

                        $name = $_FILES["image"]["name"];
                        $size = filesize($_FILES["image"]["tmp_name"]);
                        $type = $_FILES["image"]["type"];

                        echo $name;
                        echo $size;
                        echo $type;

                        if(2097152<$size && ($type != "image/jpeg" || $type != "image/gif" || $type != "image/png" || $type != "image/jpg"))
                        {
                            echo '<br>';
                            var_dump($_FILES);
                            echo '<br>';
                            echo "NO.";
                        }
                        else
                        {

                        }

                    else
                    {
                        echo "Enter an image";
                    }*/



                }
            }
            else
            {

                $this->assign('title',Filter::getString('title'));
                $this->assign('desc',Filter::getString('description'));
                $this->assign('coun',Filter::getString('country'));
                $this->assign('depart',Filter::getString('date'));
                $this->assign('dur',Filter::getString('duration'));
                $this->assign('punt',Filter::getString('puntuation'));
                $this->assign('hash',Filter::getString('hashtags'));

                //header('Location: http://g4.local/travel');
                $this->setLayout('project/travel.tpl');
            }
        }

    }

    public function checkTitle($title){

        $this->assign('title',$title);
        if(strlen($title) < 80){
            //echo "title";
            return true;
        }else{
            echo 'Title must be 80 characters length maximum.';
            return false;
        }

    }

    public function checkDescription($description){
        $this->assign('desc',$description);
        if(is_string($description)){
            //echo "description";
            return true;
        }else{
            return false;
        }
    }

    public function checkDate($date){
        //$date = Session::getInstance()->get('date');
        $this->assign('depart',$date);
        $dateItem = explode ("/", $date);
        $numberDateItem = count ($dateItem);

        //Posem la data em format dd-mm-yyyy per poder usar despres la funcio strtotime()
        //$data = str_replace("/", "-", $date);

        if ($numberDateItem == 3 && strlen($dateItem[0]) == 2 && strlen($dateItem[1]) == 2 && strlen($dateItem[2]) == 4 && checkdate ($dateItem[1] , $dateItem[0], $dateItem[2]) == 1) {
            //echo ("esta be");
            return true;
        }
        else
        {
            echo ("Wrong date. Enter a valid one. Format dd/mm/yyyy.");
            return false;
        }
    }

    public function checkCountry($country)
    {
        $this->assign('coun',$country);

        if(is_string($country))
        {
            //echo "country";
            return true;
        }
        else
        {
            return false;
        }
    }

    public function checkDuration($duration)
    {
        $duration = (int) $duration;
        $this->assign('dur',$duration);

        if($duration > 0 && is_int($duration))
        {
            //echo "duration";
            return true;
        }
        else
        {
            echo "Duration is in days. Must be an Integer";
            return false;
        }
    }

    public function checkPuntuation($puntuation)
    {
        if(empty($puntuation))
        {
            echo ("Puntuation must be between 1 and 10.");
            return false;
        }
        $puntuation = (int) $puntuation;
        $this->assign('punt',$puntuation);

        if(is_int($puntuation) && $puntuation < 11 && $puntuation>=1)
        {
            //echo "puntuationOk";
            return true;
        }
        else
        {
            echo ("Puntuation must be between 1 and 10.");
            return false;
        }
    }

    public function checkImage($image)
    {
        //$photo2upload = $_FILES['image'];
    }

    public function checkHashtags($hashtag)
    {
        $this->assign('hash',$hashtag);
        $countHash = 0;
        $countWhiteSpace = 0;
        for($i=0; $i<strlen($hashtag); $i++)
        {
            if($hashtag{$i}=='#')
            {
                $countHash++;
            }
        }

        for($i=1; $i<strlen($hashtag); $i++)
        {
            if($hashtag{$i}==' ')
            {
                $countWhiteSpace++;
            }
        }

        if(($countHash>0 && $countHash<6) && ($countWhiteSpace==$countHash-1))
        {
            //echo "hash";
            return true;
        }
        else
        {
            echo '<br>';
            echo "Write '#' before.";
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