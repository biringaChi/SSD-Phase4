<?php
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

error_reporting(E_ALL & ~E_NOTICE);

include_once "Role.php";
include_once "Sensitive.php";
include_once "InputValidation.php";
require_once "../src/DBController.php";

class Context {
	/**
	 * Context class delegates operations to the AbstractStrategy interface
	 */

	public Strategy $strategy;

	public function __construct($semester, $department, $coursename, $courseid, $db) {
		$this->db = $db;
		$this->semester = $semester;
		$this->department = $department;
		$this->coursename = $coursename;
		$this->courseid = $courseid;
    }

	public function securityContext(Strategy $strategy) {
		$security_checks = [];
		$this->strategy = $strategy;
		
		if(isset($strategy)) {
			$type_format = $this->strategy->validateForTypeFormat($this->semester, $this->department, $this->coursename, $this->courseid);
			$whitelist_fields = $this->strategy->whitelistingFields($this->semester, $this->department, $this->coursename, $this->courseid);
			$xss = $this->strategy->validateForCrossSiteScripting($this->semester, $this->department, $this->coursename, $this->courseid);
			$sql_injection = $this->strategy->validateForSQLInjection($this->semester, $this->coursename, $this->db);
			$csrf = $this->strategy->validateForCrossSiteRequestForgery();
			array_push($security_checks, $type_format, $whitelist_fields, $xss, $csrf, $sql_injection);
		}
		if (!in_array("1", $security_checks)) {
			echo "Something went wrong";
		}
		echo "Success";
    }
}

$db = null;
$semester = $_POST["semester"];
$department = $_POST["department"];
$coursename = $_POST["coursename"];
$courseid = $_POST["courseid"];

$context = new Context($semester, $department, $coursename, $courseid, $db);
$context->securityContext(new InputValidation());
$context->securityContext(new Role());
$context->securityContext(new Sensitive());
?>