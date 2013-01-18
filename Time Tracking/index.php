<?php

/**
 * Main controller for application
 * 
 * @author Jigme Datse Yli-Rasku <info@datsemultimedia.com>
 * @copyright Datse Multimedia Productions 2013
 * @license http://opensource.org/licenses/ISC ISC License
 * 
 * Copyright (c) 2013, Datse Multimedia Productions 
 * 
 * Permission to use, copy, modify, and/or distribute this software for 
 * any purpose with or without fee is hereby granted, provided that the 
 * above copyright notice and this permission notice appear in all copies. 
 * 
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES 
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF 
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR 
 * ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES 
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN 
 * ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT 
 * OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 */
 
/**
 * 
 */
 
require "controller/session.php"; 
include "controller/createuser.php";
//include "controller/editroles.php";
//include "controller/login.php"; 

require_once "includes/debug.inc.php";

$debug=TRUE;

debug("action=".$_POST["action"], $debug);


  
switch ($_POST["action"]) {
	case "createuser":
		createUser($_POST);
		break;
	case "createrole":
		createRole($_POST);
		break;
	case "login":
		login($_POST);
		break;
	default:
		include "view/index.html.php";
		break;
}

