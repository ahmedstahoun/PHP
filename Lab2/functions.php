<?php
require_once 'config.php';


function validate_form() {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    if ((empty($_POST["name"])) && (!empty($_POST["email"])) && (!empty($_POST["message"]))) {
        echo "Name is required";
    } else if ((!empty($_POST["name"])) && (empty($_POST["email"])) && (!empty($_POST["message"]))) {
        echo "Email is required";
    } else if ((!empty($_POST["name"])) && (!empty($_POST["email"])) && (empty($_POST["message"]))) {
        echo "Message is required";
    } else if ((empty($_POST["name"])) && (empty($_POST["email"])) && (!empty($_POST["message"]))) {
        echo "Name & Email are required";
    } else if ((empty($_POST["name"])) && (!empty($_POST["email"])) && (empty($_POST["message"]))) {
        echo "Name & Message are required";
    } else if ((!empty($_POST["name"])) && (empty($_POST["email"])) && (empty($_POST["message"]))) {
        echo "Email & Message are required";
    } else if ((empty($_POST["name"])) && (empty($_POST["email"])) && (empty($_POST["message"]))) {
        echo "Name, Email & Message are required";
    } else {
        if ((strlen($name) > MAX_NAME_LENGTH) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($message) <= MAX_MESSAGE_LENGTH)) {
            echo "Name is not vaild.";
        } else if ((strlen($name) <= MAX_NAME_LENGTH) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($message) <= MAX_MESSAGE_LENGTH)) {
            echo "Email is not vaild.";
        } else if ((strlen($name) <= MAX_NAME_LENGTH) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($message) > MAX_MESSAGE_LENGTH)) {
            echo "Message legenth has to be less 225.";
        } else if ((strlen($name) > MAX_NAME_LENGTH) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($message) <= MAX_MESSAGE_LENGTH)) {
            echo "Name & Email are not vaild.";
        } else if ((strlen($name) > MAX_NAME_LENGTH) && (filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($message) > MAX_MESSAGE_LENGTH)) {
            echo "Name & Message are not vaild.";
        } else if ((strlen($name) <= MAX_NAME_LENGTH) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($message) > MAX_MESSAGE_LENGTH)) {
            echo "Email & Message are not vaild.";
        } else if ((strlen($name) > MAX_NAME_LENGTH) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (strlen($message) > MAX_MESSAGE_LENGTH)) {
            echo "Name, Email & Message are not vaild.";
        } else {
            echo "<h2>Thank you for contacting Us</h2><b>Name: </b>" . $name . "<br><b>Email: </b>" . $email . "<br><b>Message: </b>" . $message;
        }
    }
  
}
}


function clearBtn() {
    $name = "";
    $email = "";
    $message = "";
}




function remeber_variable($var) {
    if (isset($_POST[$var]) && !empty($_POST[$var])) {
        return $_POST[$var];
    } else {
        return "";
    }
}





function save_data_to_file(){
    $logs_file = fopen(_Saving_File_, "a+");
    $name = $_POST["name"];
    $email = $_POST["email"];
    $submit_date = date("F j Y g:i a");
    $submit_ip = $_SERVER["REMOTE_ADDR"];
    $written_string= "$submit_date , $submit_ip , $email , $name"; 
    fwrite($logs_file, $written_string.PHP_EOL);
    fclose($logs_file); 


   
}

function convert_file_to_array() {
    return file(_Saving_File_);
}


