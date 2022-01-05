<?php
include_once ($_SERVER['DOCUMENT_ROOT']. "/crud/config.php");
use Bitm\Banner;
$_banner = new Banner();
$banner = $_banner-> Delete();