<?php 
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

error_reporting(E_ALL & ~E_NOTICE);
include_once("Strategy.php");

class Sensitive implements Strategy {
	/**
	 * Handles Sensitive Data.
	 * This module clears input fields sensitive data
	 */
	
	public function clearSensitiveInfo($coursename, $courseid, $search) {		
		if(isset($search)) {
			$coursename = false;
			$courseid = false;
			reset($coursname, $courseid);
		}
		return true;
	}

	public function secureRole() {
		null;
	}

	public function validateForTypeFormat($semester, $department, $coursename, $courseid) {
		null;
	}

	public function whitelistingFields($semester, $department, $coursename, $courseid) {
		null;
	}

	public function validateForCrossSiteScripting($semester, $department, $coursename, $courseid) {
		null;
	}
	public function validateForSQLInjection($semester, $coursename, $db) {
		null;
	}

	public function validateForCodeInjection($semester, $department, $coursename, $courseid) {
		null;
	}

	public function validateForCrossSiteRequestForgery() {
		null;
	}
}
?> 