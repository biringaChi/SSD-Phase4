<?php 
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

namespace CourseSearch;
include("Strategy.php");

class Sensitive implements Strategy {
	/**
	 * Handle Sensitive Data.
	 * This module clears sensitive data of input fields
	 */
	
	public function clearSensitiveInfo($coursename, $courseid, $search) {		
		if(isset($search)) {
			$coursename = false;
			$courseid = false;
			// reset() --> reset form 
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