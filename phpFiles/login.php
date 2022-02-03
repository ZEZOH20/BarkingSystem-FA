<?php
require_once("Classes/config.php");
require_once("Classes/User.php");
require_once('Classes/Transaction.php');

//remove as soon as//
require_once("Classes/MysqlMainPro.php");
//remove as soon as//

$issue = false;
$data = [];
$exceptions = [];
$user_registerd = [];
session_start();
//if empity ceils 
foreach ($_POST as $key => $value) {
    //echo $_POST[$key];
    if (empty($_POST[$key])) {
        $issue = true;
        $exceptions[$key] = $key . ' ' . 'is require';
    }
}
//var_dump($exceptions);
$_SESSION['$exceptions'] = $exceptions;

//if empity ceils
//******************************************* */
//filter values

//fetch user password from db
$cn = new Mysql_process('user');
$user_selected = $cn->mysql_select(['*' => null], ['e_mail', $_POST['e_mail']]);
if (!empty($user_selected)) {
    $user_registerd = $user_selected[0];
} else {
    header("location:../b.php");
}
//print_r($user_selected[0]['password']);
//************************************** */
foreach ($_POST as $key => $value) {
    if ($key == "e_mail") {
        $email = filter_var(trim($value), FILTER_VALIDATE_EMAIL);
        if (!$email && !isset($exceptions['e_mail'])) {
            $issue = true;
            $exceptions[$key] = 'wrong Email';
        }
    }

    //add elements
    $data[$key] = trim($value);
}

if (isset($_POST['password'])&&!empty($user_selected[0]['password'])) {
    if ($user_selected[0]['password'] != $_POST['password']) {
        $issue = true;
        if(!isset($exceptions['password'])){
            $exceptions['password'] = 'Not identical passwords';
        } 
    } else if (!$issue) {
        //convert $user_registerd array values into string
        $user_data = '';
        foreach ($user_registerd as $key => $value) {
            if($key!='password')
            $user_data .= $value . ' ';
        }
        // you are login now 
        echo 'here';
        setcookie('login', $user_data, time() + (86400 * 30),"/"); //value of cookie must be of tybe string
        //var_dump($_COOKIE['login']);
        $exceptions['operation'] = 'you are log in';
        $_SESSION['$exceptions'] = $exceptions;
        header("location:../home.php");
    }
}

if($issue){
    $_SESSION['$exceptions'] = $exceptions;
    header("location:../b.php");
}

