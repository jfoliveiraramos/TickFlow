<?php

	include_once(__DIR__.'/../classes/session.class.php');
	include_once(__DIR__.'/../templates/common.tpl.php');
	include_once(__DIR__.'/../templates/admin.tpl.php');
	include_once(__DIR__.'/../templates/profile.tpl.php');
	include_once(__DIR__.'/../classes/department.class.php');
	include_once(__DIR__.'/../classes/priority.class.php');
	include_once(__DIR__.'/../classes/status.class.php');


	$session = new Session();

	if (!$session->isLoggedIn()){
		header("Location: authentication.php");
		exit();
	}

	$departments = Department::getDepartments();
	$statuses = Status::getStatuses();
	$priorities = Priority::getPriorities();

	drawHeader("admin");
	drawAdmin($departments, $statuses, $priorities);
	drawProfile($user, $departments);
	drawFooter();
?>