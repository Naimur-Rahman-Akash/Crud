<?php
include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
use Bitm\Register;
$user_name = $_POST ['username'];
$password = $_POST ['password'];
function is_empty ($value)
{
    if ($value == ''){
    return true;
}else{
   return false; 
}
}
if (empty('username') || empty('password')){
    session_start();
    echo $_SESSION['message'] = "password  cant be empty";
    header("location:show.php");
}
else {
$_user = new Register();
$_user->Login($user_name, $password);
}
