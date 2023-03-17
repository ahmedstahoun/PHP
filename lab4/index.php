<?php

require("vendor/autoload.php");
$page=isset($_GET["page"])?$_GET["page"]:"";

switch($page){
    case "items":
        require_once("routers/itemRouter.php");
        break;
    default:
        require_once("routers/itemRouter.php");
        break;
}