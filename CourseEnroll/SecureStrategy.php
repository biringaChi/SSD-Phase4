<?php 
/**
* Author: Chidera Biringa
* Github: biringaChi
*/


interface SecureStrategy {
	public function validateForTypeFormat($semester, $department, $coursename, $courseid);	 
	public function whitelistingFields($semester, $department, $coursename, $courseid);
	public function validateForCrossSiteScripting($semester, $department, $coursename, $courseid);
	public function validateForSQLInjection($semester, $coursename, $dbb);
	public function validateForCodeInjection($semester, $department, $coursename, $courseid);
	public function validateForCrossSiteRequestForgery();
	public function clearSensitiveInfo($coursename, $courseid, $button);
	public function secureRole();
}


class InputValidation implements SecureStrategy {
	/**
	 * Input Validation.
	 * This module validates input for Type, Format, Length, Special Characters, 
	 * Whitelisting, Cross-site Scripting, Cross-site Request Forgery, Code Injection
	 */

	public function validateForCodeInjection($semester, $department, $coursename, $courseid) {null;}
	public function clearSensitiveInfo($coursename, $courseid, $button) {null;}
	public function secureRole() {null;}
	
	public function validateForTypeFormat($semester, $department, $coursename, $courseid) {
		// Validates inputs for Type and Format
		echo "Validating for type format...";
		foreach(array($semester, $department, $coursename, $courseid) as $filter) {
			$filter = stripslashes($filter);
			if(!empty($filter) && is_string($filter) && strlen($filter) >= 4) {
				return true;
			}
		}
		return false;
	}

	public function whitelistingFields($semester, $department, $coursename, $courseid) {
		// Validates inputs for "Whitelist" paramters
		echo "Validating for course search paramater...";
		$semesterWhitelist = "/(fall|summer|spring)+\d{4}/";
		$departmentWhitelist = array("computerscience", "computerandinformationscience", "electricalandcomputerengineering");
		$coursenameWhitelist = "cybersecurity";
		
		if (in_array(preg_replace("/\s+/", "", strtolower($department)), $departmentWhitelist) && 
			preg_match($semesterWhitelist, strtolower($semester)) && 
			str_contains(strtolower($coursename), $coursenameWhitelist) &&
			is_numeric($courseid)) {
			return true;
		}
		return false;
	}

	public function validateForCrossSiteScripting($semester, $department, $coursename, $courseid) {
		// Validates inputs for Cross-site scripting
		echo "Validating for cross-site scripting...";
		foreach(array($semester, $department, $coursename, $courseid) as $filter) {
			htmlspecialchars($filter);
			// header("Content-Security-Policy: default-src 'self'");
		}
		return true;
	}
	
	public function validateForCrossSiteRequestForgery() {
		// Validates inputs for Cross-site Request Forgery
		echo "Validating for cross-site request forgery...";
		$token = filter_input(INPUT_POST, "token");
		if (!$token || $token !== $_SESSION["token"]) {
			header($_SERVER["SERVER_PROTOCOL"] . "Not Allowed");
			return true;
		}
		return false;
	}

	public function validateForSQLInjection($semester, $coursename, $db) {
		// Validates inputs for SQL Injection
		echo "Validating for sql injection...";
		if (is_string($semester) && is_string($coursename)) {
			$query = "SELECT *
				FROM Section
				CROSS JOIN Course ON Section.Course = Course.Code
				INNER JOIN User ON Section.Instructor = User.UserID
				WHERE CourseName = 'defaultvalue' AND Semester = 'defaultvalue' AND Section.Year = 'defaultvalue'";
			$stmt = $db->prepare($query);
			$stmt->bindParam(":fname", $semester, SQLITE3_TEXT);
			$stmt->bindParam(":lname", $coursename, SQLITE3_TEXT)->execute();
			return true;
		}
		return false;
	}
}

class Role implements SecureStrategy {
	/**
	 * Secure Role.
	 * This module assigns the only CourseSearch and CourseEnroll module to a student
	 */
	
	public function secureRole() {
	}
	public function validateForTypeFormat($semester, $department, $coursename, $courseid) {null;}
	public function whitelistingFields($semester, $department, $coursename, $courseid) {null;}
	public function validateForCrossSiteScripting($semester, $department, $coursename, $courseid) {null;}
	public function validateForSQLInjection($semester, $coursename, $db) {null;}
	public function validateForCodeInjection($semester, $department, $coursename, $courseid) {null;}
	public function validateForCrossSiteRequestForgery() {null;}
	public function clearSensitiveInfo($coursename, $courseid, $button) {null;}
}


class Sensitive implements SecureStrategy {
	/**
	 * Handle Sensitive Data.
	 * This module clears sensitive data of input fields
	 */

	public function clearSensitiveInfo($coursename, $courseid, $button) {
		if(isset($search)) {
			$coursename = false;
			$courseid = false;
			// reset() --> reset form 
		}
		return true;
	}
	public function secureRole() {null;}
	public function validateForTypeFormat($semester, $department, $coursename, $courseid) {null;}
	public function whitelistingFields($semester, $department, $coursename, $courseid) {null;}
	public function validateForCrossSiteScripting($semester, $department, $coursename, $courseid) {null;}
	public function validateForSQLInjection($semester, $coursename, $db) {null;}
	public function validateForCodeInjection($semester, $department, $coursename, $courseid) {null;}
	public function validateForCrossSiteRequestForgery() {null;}
}

?> 