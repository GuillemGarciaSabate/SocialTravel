<?php


class MainModel extends Model
{

    public function insertar($username, $birth, $email, $password)
    {

        $query = <<<QUERY

INSERT INTO
    `socialtravel`.`Users` (`User`, `Birth`, `Email`, `Password`)
VALUES
    ('$username', '$birth', '$email', '$password');


QUERY;

        $this->execute ($query);
    }

    public function insertarViatge($uid, $title, $des, $date,$img, $con, $dur, $punt, $hash)
    {

        $query = <<<QUERY

INSERT INTO
    `socialtravel`.`Travel` (`User_id`, `Title`, `Description`, `Date`, `Days`,`Image`, `Country`, `Puntuation`, `Hashtags`)
VALUES
    ('$uid', '$title', '$des', '$date', '$dur', '$img', '$con', '$punt', '$hash');


QUERY;

        $this->execute ($query);
    }

    public function insertFollow($userID, $sessio, $followedID, $userName)
    {

        $query = <<<QUERY

INSERT INTO
    `socialtravel`.`Follow` (`ID`, `USER`, `ID_Followed`, `USER_Followed`)
VALUES
    ('$userID', '$sessio', '$followedID', '$userName');


QUERY;

        $this->execute ($query);
    }

    public function addComment($comment, $travel, $user)
    {

        $query = <<<QUERY

INSERT INTO
    `socialtravel`.`Comments` (`Comment`, `Travel`, `User`)
VALUES
    ('$comment', '$travel', '$user');


QUERY;

        $this->execute ($query);
    }

    public function selectUserID($username){

        $sql = <<<QUERY
SELECT
    ID AS id FROM socialtravel.Users
    WHERE User LIKE '%$username%';


QUERY;

        $num = $this->getAll($sql);
        return $num[0]["id"];

    }

    public function selectUserIDExact($username){

        $sql = <<<QUERY
SELECT
    ID AS id FROM socialtravel.Users
    WHERE User='$username';


QUERY;

        $num = $this->getAll($sql);
        return $num[0]["id"];

    }

    public function selectUserToFollow($username){

        $sql = <<<QUERY
SELECT
    ID AS id FROM socialtravel.Users
    WHERE User LIKE '%$username%';


QUERY;

        $num = $this->getAll($sql);
        return $num;

    }

    public function selectUserName($id){

        $sql = <<<QUERY
SELECT
    User AS name FROM socialtravel.Users
    WHERE ID='$id';


QUERY;

        $num = $this->getAll($sql);
        return $num[0]['name'];

    }

    public function nextTravel($id){

        $sql = <<<QUERY
SELECT
   Travel_id AS Tid FROM socialtravel.Travel
   WHERE Travel_id > '$id' ORDER BY Travel_id ASC LIMIT 1;

QUERY;

        $num = $this->getAll($sql);
        return $num[0]['Tid'];
    }

    public function previousTravel($id){

        $sql = <<<QUERY
SELECT
   Travel_id AS Tid FROM socialtravel.Travel
   WHERE Travel_id < '$id' ORDER BY Travel_id DESC LIMIT 1;

QUERY;

        $num = $this->getAll($sql);
        return $num[0]['Tid'];
    }

    public function firstTravel(){

        $sql = <<<QUERY
SELECT
   Travel_id AS Tid FROM socialtravel.Travel
   WHERE Travel_id = (SELECT MIN(Travel_id) FROM socialtravel.Travel);

QUERY;

        $num = $this->getAll($sql);
        return $num[0]['Tid'];
    }

    public function lastTravel(){

        $sql = <<<QUERY
SELECT
   Travel_id AS Tid FROM socialtravel.Travel
   WHERE Travel_id = (SELECT MAX(Travel_id) FROM socialtravel.Travel);

QUERY;

        $num = $this->getAll($sql);
        return $num[0]['Tid'];
    }

    public function selectUserbyCountry($countrytoSearch){

        $sql = <<<QUERY
SELECT
    User_id FROM socialtravel.Travel
    WHERE Country LIKE '%$countrytoSearch%';


QUERY;

        $count = 0;
        $myArray = array();

        $info = $this->getAll($sql);

        foreach($info as $index){
            $myArray[$count] = $this->selectUserName($index['User_id']);
            $count++;
        }

        return $myArray;

    }

    public function selectFollowers($id){

        $sql = <<<QUERY
SELECT
    USER_Followed FROM socialtravel.Follow
    WHERE ID='$id';


QUERY;

        $count = 0;
        $myArray = array();

        $info = $this->getAll($sql);

        foreach($info as $index){
            $myArray[$count] = $index;
            $count++;
        }

        return $myArray;


    }

    public function  deleteFollow($userID, $followedID)
    {
        $sql = <<<QUERY
DELETE FROM Follow
    WHERE ID='$userID' AND ID_Followed='$followedID';

QUERY;

        $this->execute ($sql);
    }

    public function deleteComentwithTravelId($id)
    {
        $sql = <<<QUERY
DELETE FROM Comments
    WHERE Travel='$id';

QUERY;

        $this->execute ($sql);
    }

    public function  deleteTravel($id)
    {
        $sql = <<<QUERY
DELETE FROM Travel
    WHERE Travel_id='$id';

QUERY;

        $this->execute ($sql);
    }

<<<<<<< HEAD


    public function updateTravel($tid, $title, $des, $date, $dur, $photo ,$con, $punt, $hash)
   {
       $query = <<<QUERY

UPDATE socialtravel.Travel
=======


    public function updateTravel($tid, $title, $des, $date, $dur, $photo ,$con, $punt, $hash)
    {
        $query = <<<QUERY

UPDATE socialtravel.travel
>>>>>>> b947355a4bc58bb52efbd7eb67b7129e85f85962
   SET Title='$title', Description='$des', Date='$date', Days='$dur', Image='$photo', Country='$con', Puntuation='$punt', Hashtags= '$hash'
WHERE Travel_id='$tid';

QUERY;

        $this->execute ($query);
    }

    public function getCommentsbyID($user_id)
    {
        $sql = <<<QUERY
SELECT
   Comment, Travel FROM socialtravel.Comments
   WHERE User = '$user_id';

QUERY;


        $comments = $this->getAll($sql);
        return $comments;
    }

    public function getUsersTravels($user_id)
    {
        $sql = <<<QUERY
SELECT
   * FROM socialtravel.Travel
   WHERE User_id = '$user_id';

QUERY;


        $travels = $this->getAll($sql);
        return $travels;
    }

    public function imageLIKE($id)
    {
        $sql = <<<QUERY
SELECT
   Image FROM socialtravel.Travel
   WHERE Travel_id = '$id';



QUERY;

        $thistravel = $this->getAll($sql);
        return $thistravel;
    }

    public function getTravelbyID($id)
    {
        $sql = <<<QUERY
SELECT
   * FROM socialtravel.Travel
   WHERE Travel_id = '$id';



QUERY;

        $thistravel = $this->getAll($sql);
        /*$myArray = array();
        $myArray['Title'] = $thistravel[0]['Title'];
        $myArray['Description'] = $thistravel[0]['Description'];
        $myArray['Date'] = $thistravel[0]['Date'];
        $myArray['Days'] = $thistravel[0]['Days'];
        $myArray['Country'] = $thistravel[0]['Country'];
        $myArray['Puntuation'] = $thistravel[0]['Puntuation'];
        $myArray['Hashtags'] = $thistravel[0]['Hashtags'];
        $myArray['Travel_id'] = $thistravel[0]['Travel_id'];
        $myArray['User_id'] = $thistravel[0]['User_id'];
        $myArray['Image'] = $thistravel[0]['Image'];*/

        return $thistravel;
    }

    public function getTravelbyID2($id)
    {
        $sql = <<<QUERY
SELECT
   * FROM socialtravel.Travel
   WHERE Travel_id = '$id';



QUERY;

        $thistravel = $this->getAll($sql);
        $myArray = array();
        $myArray['Title'] = $thistravel[0]['Title'];
        $myArray['Description'] = $thistravel[0]['Description'];
        $myArray['Date'] = $thistravel[0]['Date'];
        $myArray['Days'] = $thistravel[0]['Days'];
        $myArray['Country'] = $thistravel[0]['Country'];
        $myArray['Puntuation'] = $thistravel[0]['Puntuation'];
        $myArray['Hashtags'] = $thistravel[0]['Hashtags'];
        $myArray['Travel_id'] = $thistravel[0]['Travel_id'];
        $myArray['User_id'] = $thistravel[0]['User_id'];

        return $myArray;
    }


    public function getTravelbyHashtag($hash){
        $sql = <<<QUERY
SELECT
   Travel_id AS Tid, Hashtags AS HT FROM socialtravel.Travel;


QUERY;

        $index = 0;
        $index2 = 0;
        $thistravel = $this->getAll($sql);
        $myArray = array();

        foreach($thistravel as $element)
        {
            $word2split = explode(" ", $element['HT']);

            $index = $index+1;

            foreach($word2split as $item)
            {

                if($hash == $item)
                {
                    $myArray[$index2] = $element['Tid'];
                    $index2 = $index2 +1;
                }
            }
        }

        return $myArray;
    }

    public function getLastTravel(){

        $sql = <<<QUERY
SELECT
   * FROM socialtravel.Travel
   ORDER BY Travel_id DESC LIMIT 1;


QUERY;

        $myArray = array();
        $plats = $this->getAll($sql);

        $myArray['Travel_id'] = $plats[0]['Travel_id'];
        $myArray['User_id'] = $plats[0]['User_id'];
        $myArray['Title'] = $plats[0]['Title'];
        $myArray['Description'] = $plats[0]['Description'];
        $myArray['Date'] = $plats[0]['Date'];
        $myArray['Days'] = $plats[0]['Days'];
        $myArray['Country'] = $plats[0]['Country'];
        $myArray['Puntuation'] = $plats[0]['Puntuation'];
        $myArray['Hashtags'] = $plats[0]['Hashtags'];
        $myArray['Travel_id'] = $plats[0]['Travel_id'];
        $myArray['Image'] = $plats[0]['Image'];

        return $myArray;
    }

    public function getLast10Travels(){

        $sql = <<<QUERY
SELECT
   * FROM socialtravel.Travel
   ORDER BY Travel_id DESC LIMIT 10;


QUERY;

        $myArray = array();
        $plats = $this->getAll($sql);
        $quants = count($plats);
        for ($i=0; $i < $quants; $i++) {
            $myArray[$i]['Title'] = $plats[$i]['Title'];
            $myArray[$i]['Description'] = $plats[$i]['Description'];
            $myArray[$i]['Date'] = $plats[$i]['Date'];
            $myArray[$i]['Days'] = $plats[$i]['Days'];
            $myArray[$i]['Country'] = $plats[$i]['Country'];
            $myArray[$i]['Puntuation'] = $plats[$i]['Puntuation'];
            $myArray[$i]['Hashtags'] = $plats[$i]['Hashtags'];
            $myArray[$i]['Travel_id'] = $plats[$i]['Travel_id'];
        }

        return $myArray;
    }

    public function sameName($username){

        $sql = <<<QUERY
SELECT
   COUNT(User) AS found FROM socialtravel.Users
   WHERE User='$username';

QUERY;

        return $this->getAll($sql);
    }

    public function sameEmail($email){

        $sql = <<<QUERY
SELECT
   COUNT(Email) AS found FROM socialtravel.Users
   WHERE Email='$email';

QUERY;

        return $this->getAll($sql);
    }

    public function validateUser($user, $pwd){


        $sql = <<<QUERY
SELECT
   COUNT(User) AS found FROM socialtravel.Users
   WHERE User='$user' AND Password='$pwd';

QUERY;
        $num = $this->getAll($sql);
        return $num[0]["found"];

    }

    /* public function sobreescriu($id, $nom, $tipus, $url)
     {
         $query = <<<QUERY

  UPDATE grup4.plats
     SET nom='$nom',tipus='$tipus', url='$url'
  WHERE id='$id';


  QUERY;

         $this->execute ($query);
     }



     public function getMaxId(){

         $sql = <<<QUERY
  SELECT id FROM plats
     WHERE ID = (SELECT MAX(id) AS id FROM plats)

  QUERY;

         return $this->getAll($sql);
     }

     public function getNames(){

         $sql = <<<QUERY
  SELECT
     id,
     nom,
     url,
     tipus
  FROM plats;

  QUERY;

         return $this->getAll($sql);
     }

     public function getNumberDish(){

         $sql = <<<QUERY
  SELECT
     COUNT(*) AS Total
  FROM plats;

  QUERY;

         return $this->getAll($sql);
     }

     public function deleteDish($plate){

         $sql = <<<QUERY
  DELETE FROM plats
     WHERE nom='$plate';

  QUERY;

         $this->execute ($sql);

     }

    public function validateUser($user, $pwd){

     aqui hem de fer una query que compti els usuaris amb $user i $pwd i retorni el
    numero de users trobats, si es un, esq es correcte, sino, incorrecte
    }*/

}