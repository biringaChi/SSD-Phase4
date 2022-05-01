<?php 
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

namespace CourseSearch;
include("Strategy.php");

class Role implements Strategy {
	/**
	 * Secure Role.
	 * This module assigns the only CourseSearch and CourseEnroll module to a student
	 */
	
	public function secureRole() {
		// if paramter is set, assign only courseSearch() and courseEnroll() responsibilities
		echo "Hello secure role";
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

	public function clearSensitiveInfo($coursename, $courseid, $button) {
		null;
	}
}
?> 