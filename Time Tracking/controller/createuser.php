<?php

/**
 * Controller to create a User
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
 * Function createUser($post);
 * 
 * The controller Function for Creating A user, accpets the $_POST 
 * variable as paramater
 * 
 * @param mixed[] $post The entire $_POST variable as of current version.
 * @return boolean success or failure
 * 
 * 
 */

function createUser($post){
	require_once 'includes/usermanagement.inc.php';
	require_once 'includes/debug.inc.php';

	$debug=TRUE;

	$newusername="";
	$newpassword="";
	$newemail = "";
	
	$action=htmlentities($post["action"]);
	$username=htmlentities($post["username"]);
	$password=md5($post["password"]);
	$email=htmlentities($post["email"]);
	
	$usercreateerror=NULL;
	$erors = FALSE;
	
	debug("Entering Control structure", $debug);
	
	if (isset($action) && $action=="createuser") {
		debug("We think we have a subbmitted form", $debug);
		if (!isset($username) || $username=='') {
			$usercreateerror[]="Please enter a username";
			$errors = TRUE;
		}
		if (!isset($email) || $email=='') {
			$usercreateerror[]="Please enter an email address";
			$errors = TRUE;
		}
		if (!isset($post["password"]) || $post["password"]=='') {
			$usercreateerror[]="Please enter a password";
			$errors = TRUE;
		}
		echo (userExists($username));
		if (userExists($username)) {
			$usercreateerror[]="Username '$username' already exists please select a new one";
			$errors = TRUE;
		}
		if ($errors==FALSE) {
			debug("We are adding the user", $debug);
			addUser($username, $password, $email);
		} 
	}
	
	
	include 'view/createuser.html.php';
	


}

