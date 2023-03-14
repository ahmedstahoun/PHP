<?php

class Counter{
    private $_count;
    


    public function __construct()
    {
        $this->_count = $this->get_count();
    }


    public function get_count(){
        if(file_exists(_counter_file)){
            return  intval(file_get_contents(_counter_file));
        }else{
            return 0;
        }
    }


    public function increment(){
        
        if(!isset($_SESSION[_session_key_counter])){
            $this->_count++;
            $_SESSION[_session_key_counter] = true;
            return $this->_count;
        }else{
            return false; 
        }
        
    }

    public function update_counter(){
       $fp= fopen(_counter_file,"w+");
        fwrite($fp,$this->_count);
        fclose($fp);
    }

    public function increment_and_update(){
        
        if($this->increment() != false){
            $this->update_counter();
        }
        
       
        
    }


}

