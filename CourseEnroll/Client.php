<?php
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

error_reporting(E_ALL & ~E_NOTICE);

/***  Testing Design*/
include_once "Factory.php";
include_once "SecureContext.php";
require_once "../src/DBController.php";


class Client {
	/**
	 * Client class gets an interface of SecureStrategy
	 */
	public function __construct($db) {
		// Pass DB connection 
		$this->db = $db;
    }

	public function client() {
		$security_checks = [];
		$semester = $_POST["semester"];
		$department = $_POST["department"];
		$coursename = $_POST["coursename"];
		$courseid = $_POST["courseid"];

		$factory = new ConcreteFactory();
		$context = new SecureContext($factory->getSecureStrategy("InputValidation"));

		$type_format = $context->executeValidateForTypeFormat($semester, $department, $coursename, $courseid);
		$whitelist_fields = $context->executeWhitelistingFields($semester, $department, $coursename, $courseid);
		$xss = $context->executeValidateCrossSiteScripting($semester, $department, $coursename, $courseid);
		$code_injection = $context->executeValidateCodeInjection($semester, $department, $coursename, $courseid);
		$sql_injection = $context->executeValidateForSQLInjection($semester, $coursename, $this->db);
		$csrf = $context->executeValidateForCrossSiteRequestForgery();
		array_push($security_checks, $type_format, $whitelist_fields, $sql_injection, $xss, $csrf, $code_injection);
		
		if (!in_array("1", $security_checks)) {
			echo "Something went wrong";
		}
		echo "Success";
	}
}

$client = new Client($db);
$client->client();

?>