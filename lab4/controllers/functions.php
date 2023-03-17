<?php

function return_response($data,$status_code){
    header("Content-Type: application/json");
    http_response_code($status_code);
    echo json_encode($data);

}

function get_items($table,$id=""){
    $DB_handler = new MySQLHandler("items");
    try{
        $DB_handler->connect();
       
       
            $result=$DB_handler->get_record_by_id($id);
  
            
        return $result;
    }catch(Exception $err){
        $err = ["error"=>_MYSQL_SERVER_ERROR_];
        return return_response($err,500);
        exit();
    }

}

function get_all_items($table,$start=0){
    $DB_handler= new MySQLHandler("items");
    try{
        $result = $DB_handler -> get_data(array(),$start);
        return $result;

    }catch(Exception $err){
        $err =   $err=["error"=>_MYSQL_SERVER_ERROR_];
        return_response($err,500);
        exit();
    }
}

function save_item(){
    $fields=["name","price","units_in_stock"];
    $data = json_decode(file_get_contents('php://input'), true);

    foreach($fields as $field){
        if(!isset($data[$field]) || empty($data[$field])){
            $err=["error"=> "data insuffient"];
            return return_response($err,404);
        }
    }
    try{
        $DB_handler=new MySQLHandler("items");
    if($DB_handler->save($data)){
        return $result;
    }
    }catch(Exception $err){
        $err = $err=["error"=>_MYSQL_SERVER_ERROR_];
        return_response($err,500);
        exit();
    }

}



function get_rows_count($table){
    try{
        $db=new MySQLHandler($table);
        return $db->count_rows();
    }catch(Exception  $er){
        $err=["error"=> _MYSQL_SERVER_ERROR_];
        return_response($err,500);
        exit();
    }

}