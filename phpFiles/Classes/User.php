<?php
require_once("mysqlMainPro.php");
require_once("Transaction.php");
class User
{
  public $id, $user_name, $e_mail, $data;
  protected $password, $transactions = [];

  public function __construct($data)
  {
    $this->data = $data;
    foreach ($data as $key => $value) {
      $this->$key = $value;
    }
  }

  function InsertUsers()
  {
    $cn = new Mysql_process('user', $this->data);
    $this->id = (int)$cn->mysql_insert();
    return $this->id;
  }
  static function m_transaction($tData){
     Transaction::insertT($tData);
  }
}
