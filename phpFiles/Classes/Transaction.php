<?php
require_once("config.php");
require_once("mysqlMainPro.php");
require_once("user.php");
Abstract class Transaction{
  public $data,$veichal_type,$date,$start_time,$end_time,$cost;
  private static $max_veicahls=5,$i=0;

 static function insertT($tData){
       $cn=new Mysql_process('transaction',$tData);
       if(Transaction::$i!=Transaction::$max_veicahls){
         $cn->mysql_insert();
        Transaction::$i+=1;
       }else{
         session_start();
         $_SESSION['transaction']='parking is locked places are full ';
       }
 }

}