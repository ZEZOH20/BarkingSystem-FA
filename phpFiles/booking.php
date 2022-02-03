<?php
require_once("Classes/User.php");
$issue = false;
$tData = [];
$transactions = [];
session_start();
//if empity ceils 
foreach ($_POST as $key => $value) {
    //echo $_POST[$key];
    if (empty($_POST[$key])) {
        $issue = true;
        $_SESSION['empty'] = 'there are empty ceils must fill all it';
        header('location:../booking page.php');
    }
    $tData[$key] = trim($value);
}
//vehicle type?
if(!$issue){
switch($tData['cost']){
    case '10':
        $tData['veichal_type']='private car';
        break;
    case '20':
        $tData['veichal_type']='pickup truck';
        break;
    case '30':
        $tData['veichal_type']='transportation car';
        break;
    case '40':
        $tData['veichal_type']='car quarter transport';
        break;
    case '50':
        $tData['veichal_type']='travel car';
        break;
    case '60':
        $tData['veichal_type']='Public transport';
        break;
    default:
     'wrong';
}
$tData['num_of_hours']=abs($tData['end_time']-$tData['start_time']); // number of hours 
if(isset($_COOKIE['login'])){
    $array = explode(' ', $_COOKIE['login'], -2);
    $tData['user_id']=(int)$array[0]; //send user_id to make transaction
    print_r($tData);
    User::m_transaction($tData); 
  }
}
header('location:../booking page.php');

/*foreach($_POST as $key=>$value){
    echo "<div>".$value."</div><br>";
}*/
//var_dump($exceptions);


//if empity ceils
//******************************************* */