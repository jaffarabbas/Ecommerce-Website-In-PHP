<?php
class Validation
{
	public $validation_errors = array(
		-1 => 'Should have uppercase letters',
		-2 => 'Should have lowercase letters',
		-3 => 'Should have numbers',
		-4 => 'Should have special characters',
		-5 => 'Should have atleast 8 characters',
	);
	public function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	public function checkEmpty($data, $fields)
	{
		$msg = null;
		foreach ($fields as $value) {
			if (empty($data[$value])) {
				$msg .= "$value field empty <br />";
			}
		}
		return $msg;
	}

	public function isPassowrdValid($password)
	{
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
		if (!$uppercase) {
			return -1;
		} else if (!$lowercase) {
			return -2;
		} else if (!$number) {
			return -3;
		} else if (!$specialChars) {
			return -4;
		} else if (strlen($password) < 8) {
			return -5;
		} else {
			return 1;
		}
	}

	public function isEmailValid($email)
	{
		//if (preg_match("/^[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) {
		return filter_var($email, FILTER_VALIDATE_EMAIL) ? true : false;
	}

	public function isPassowordMatch($password, $repassword)
	{
		return $password == $repassword ? true : false;
	}

	public function decryptPassowrd($password,$hasedpassowrd){
		return password_verify($password,$hasedpassowrd);
	}
}
