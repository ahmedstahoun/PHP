<?php 

require_once './vendor/autoload.php';



if (!empty($_POST)) {

    $error = validate_form();
    
    if(empty($error)){
       save_data_to_file();
       
       die(); 
    }
    
}



$parameter = isset($_GET["page"]) ? $_GET["page"] : "";

if ($parameter === "users"){
    require_once("views/users.php");
    
}
else{
    require_once("views/form.php");
}

?>

