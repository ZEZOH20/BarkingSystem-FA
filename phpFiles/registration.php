<?php
require_once("Classes/config.php");
require_once("Classes/User.php");
require_once('Classes/Transaction.php');

//remove as soon as//
require_once("Classes/MysqlMainPro.php");
//remove as soon as//

//Insert New instance of user "insert new user object"
$issue = false;
$data = [];
$exceptions = [];
$user_registerd = [];
session_start();
//if empity ceils 
foreach ($_POST as $key => $value) {
    if (empty($_POST[$key])) {
        $issue = true;
        $exceptions[$key] = $key . ' ' . 'is require';
    }
}
$_SESSION['$exceptions'] = $exceptions;
($issue) ? header("location:../Signup.php") : '';
//if empity ceils
//******************************************* */
//filter values
function array_push_assoc($array, $key, $value)
{
    $array[$key] = $value;
    return $array;
}
$compare_p;
foreach ($_POST as $key => $value) {
    if ($key == "e_mail") {
        $email = filter_var(trim($value), FILTER_VALIDATE_EMAIL);
        if (!$email && !isset($exceptions['e_mail'])) {
            $issue = true;
            $exceptions[$key] = 'wrong Email';
        }
    }

    if ($key == "password" || $key == "v_password") {
        if (empty($compare_p)) {
            $compare_p = $value;
        } else {
            if ($compare_p != $value) {
                $issue = true;
                $exceptions[$key] = 'Not identical passwords';
            }
        }
    }
    if ($key != "v_password") (!$issue) ? $data = array_push_assoc($data, $key, trim($value)) : array_diff($data, array_values($data));
    //add element by use created function:delete all inserted elements of array before issue

}
/*foreach($data as $key=>$value){
          echo $key." ".$value;
      }*/
//var_dump($data);
$_SESSION['$exceptions'] = $exceptions;
($issue) ? header("location:../Signup.php") : '';

//******************************************* */
//is there other user registered with this email ? - if no issues do insertion 
$cn = new Mysql_process('user');
$search = $cn->mysql_select(['*' => null], ['e_mail', $data['e_mail']]);
if (empty($search) && !$issue) {
    $user = new User($data);
    $user_registerd[$data['e_mail']] = $user->InsertUsers(); //Email0@gmail.com=>$user_id
    $exceptions['operation'] = 'successfuly registeration ';
    $_SESSION['$exceptions'] = $exceptions;
    $_SESSION['register'] = $user_registerd;
    print_r($user_registerd);
} else if (!empty($search) && !isset($exceptions['e_mail'])) { //email used && user 
    $exceptions['operation'] = 'email already exist ';
    $_SESSION['$exceptions'] = $exceptions;
}
header("location:../Signup.php");
