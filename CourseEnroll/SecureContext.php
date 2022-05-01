<?php
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

include_once "SecureStrategy.php";

class SecureContext {
	public SecureStrategy $secureStrategy;

	public function __construct(SecureStrategy $secureStrategy) {
		$this->secureStrategy = $secureStrategy;
    }

	public function executeValidateForTypeFormat($semester, $department, $coursename, $courseid) {
		return $this->strategy->validateForTypeFormat($semester, $department, $coursename, $courseid);
    }

	public function executeWhitelistingFields($semester, $department, $coursename, $courseid) {
		return $this->strategy->whitelistingFields($semester, $department, $coursename, $courseid);
    }

	public function executeValidateCrossSiteScripting($semester, $department, $coursename, $courseid) {
		return $this->strategy->validateForCrossSiteScripting($semester, $department, $coursename, $courseid);
    }

	public function executeValidateForSQLInjection($semester, $coursename, $db) {
		return $this->strategy->validateForSQLInjection($semester, $coursename, $db);
    }

	public function executeValidateForCrossSiteRequestForgery() {
		return $this->strategy->validateForCrossSiteRequestForgery();
    }
}
?>