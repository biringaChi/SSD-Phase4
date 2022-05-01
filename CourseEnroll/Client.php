<?php
/**
* Author: Chidera Biringa
* Github: biringaChi
*/
/***  Testing Design (InputValidation)*/

class Client {

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
		$sql_injection = $context->executeValidateForSQLInjection($semester, $coursename, $this->db);
		$csrf = $context->executeValidateForCrossSiteRequestForgery();
		array_push($security_checks, $type_format, $whitelist_fields, $sql_injection, $xss, $csrf);
		
		if (!in_array("1", $security_checks)) {
			echo "Something went wrong";
		}
		echo "Success";
	}
}

$client = new Client($db);
$out = $client->client();
echo $out;

?>