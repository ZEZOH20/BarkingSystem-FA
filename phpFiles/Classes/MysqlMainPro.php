<?php 
   
   class Mysql_process{
    public $tName,$data,$size;

    public function __construct($tName,$data=null){
        $this->tName=$tName;
        $this->data=$data;
        //$this->size=sizeof($this->data);
    }
    
    public function mysql_insert(){
        $pdo_cn=new PDO(DSN,USERNAME,PASSWORD);
        //var_dump($pdo_cn);
        //require_once("config.php");
            $query="insert into"." ".$this->tName."(";
            //var_dump($this->data); 
            foreach(($this->data) as $key=>$value){
                if($value!=NULL){
                    $query.=$key.',';    
                }  
            }
            $query=substr_replace($query,"",-1); 
            $query.=')values('; //''''''''''''
            foreach(($this->data) as $key=>$value){
                if(!empty($value)){
                    $query.=':'.$key.',';
                }  
            }
            $query=substr_replace($query ,"",-1); 
			$query.=')';
            var_dump($query);
            $sth=$pdo_cn->prepare($query);
            $execute_array=array(); // execute 
            foreach (($this->data) as $key=>$value){
                if($value!=NULL){
                    $sth->bindParam(':'.$key,$value);
                    //var_dump($sth->bindParam(':'.$key,$value));
                    $execute_array[':'.$key]=$value;
                }  
            }
            
            try{
                $sth->execute($execute_array);
            }catch(Exception $e){
                return throw new Exception("Can't insert data Query syntax Error");
            } 
            return $pdo_cn->lastInsertId();
            //var_dump($sth->execute()); // ? ? ? ? ? ? ? 
            $pdo_cn='null';
        } 
       //..............................................
      // We want colums need to update and id of row
       public function mysql_update($Colums,$update_by){
           $pdo_cn=new PDO(DSN,USERNAME,PASSWORD);
           $query="update".' '.$this->tName.' '.'set'.' ';
           foreach($Colums as $key=>$value){
                if(!empty($value)){
                    $query.=$key.'=:'.$key.','." ";
                }
           }
           $query=substr_replace($query ," ",-2); 
           $query.='where'.' '.$update_by[0].'=:'.$update_by[0];
           //var_dump($query);
           $sth=$pdo_cn->prepare($query);
           
           $execute_array=array(); // execute 
           foreach ($Colums as $key=>$value){
            if($value!=NULL){
                $sth->bindParam(':'.$key,$value);
                $execute_array[':'.$key]=$value;
            }  
        }
          $sth->bindParam(':'.$update_by[0],$update_by[1]);
          $execute_array[':'.$update_by[0]]=$update_by[1];
           //Cannot add or update a child row
            //var_dump($execute_array);
           
            try{
                $sth->execute($execute_array);
            }catch(Exception $e){
                return $e;
            } 
            if(!$sth->rowCount() > 0){
                echo "Can't update, row is n't Exist";
            }
        
        $pdo_cn='null';
        }
//-----------------------------------------------------------
        public function mysql_select($Colums,$select_by){
            $pdo_cn=new PDO(DSN,USERNAME,PASSWORD);
            $names=array_keys($Colums);
            print_r($names);
            $query="select ";
            foreach( $names as $columName){
                $query.=$columName.", ";
            }
            $query=substr_replace($query ," ",-2); 
            $query.="from".' '.$this->tName.' '."where".' '.$select_by[0].'=:'.$select_by[0];
            //var_dump($query);
            $sth=$pdo_cn->prepare($query);
            $sth->bindParam(':'.$select_by[0],$select_by[1]);
        
            $selected_objects_rows=[];
           
            if($sth->execute([':'.$select_by[0]=>$select_by[1]])) {

                if($sth->rowCount() > 0) {
                    while($result = $sth->fetch(PDO::FETCH_ASSOC)) {
                        //print_r($result);
                        array_push($selected_objects_rows,$result);
                        foreach($result as $key=>$value){
                            //print_r($key." ".$value);
                        } 
                    }
                } else {
                    echo 'there are no row items selected';
                }
            } else {
                echo 'there error in the selected query';
                //var_dump($selected_objects_rows);
            $pdo_cn='null';
        }

       return $selected_objects_rows;
    
    }

    public function mysql_delete($deleted_by){
        $pdo_cn=new PDO(DSN,USERNAME,PASSWORD);
        $query='delete from '.$this->tName.' '."where".' '.$deleted_by[0].'=:'.$deleted_by[0];
        $sth=$pdo_cn->prepare($query);
        $sth->bindParam(':'.$deleted_by[0],$deleted_by[1]);
        $execute_array[':'.$deleted_by[0]]=$deleted_by[1];
        var_dump($query);
        try{
            $sth->execute($execute_array);
        }catch(Exception $e){
            return $e;
        } 
        if(!$sth->rowCount() > 0){
            echo " row already n't Exist";
        }

        return $sth->rowCount();

    }

}
    
