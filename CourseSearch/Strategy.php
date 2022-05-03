<?php
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

error_reporting(E_ALL & ~E_NOTICE);

interface Strategy {
	public function validateForTypeFormat($semester, $department, $coursename, $courseid);	 
	public function whitelistingFields($semester, $department, $coursename, $courseid);
	public function validateForCrossSiteScripting($semester, $department, $coursename, $courseid);
	public function validateForSQLInjection($semester, $coursename, $db);
	public function validateForCodeInjection($semester, $department, $coursename, $courseid);
	public function validateForCrossSiteRequestForgery();
	public function clearSensitiveInfo($coursename, $courseid, $button);
	public function secureRole();
}
?>
