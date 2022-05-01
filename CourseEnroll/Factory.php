<?php 
/**
* Author: Chidera Biringa
* Github: biringaChi
*/

interface Factory {
	public function getSecureStrategy(string $strategy);
}

class ConcreteFactory implements Factory {
	public function getSecureStrategy(string $strategy){
		switch (strtolower($strategy)) {
			case "inputvalidation":
				return new InputValidation();
				break;
			case "sensitive":
				return new Sensitive();
				break;
			case "role":
				return new Role();
				break;
			default:
				echo "Selected {$strategy} Secure Strategy is invalid! Please try again";		
		}
	}
}
?>