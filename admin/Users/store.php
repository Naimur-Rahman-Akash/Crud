<?php

include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
use Bitm\Register;
$data = $_POST;
function is_empty ($value)
{
    if ($value == ''){
    return true;
}else{
   return false; 
}
}
if (is_empty($data['username'])){
    session_start();
    echo $_SESSION['message'] = "Username  cant be empty";
    header("location:show.php");
}
else {
$_user = new Register();
$_user->Store($data);
}
