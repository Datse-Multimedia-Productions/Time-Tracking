<?php

require 'includes/usermanagement.inc.php';

$action=htmlentities($_POST["action"]);
$username=htmlentities($_POST["username"]);
$password=md5($_POST["password"]);



include "view/login.html.php";

