<?php

class Json {
	public static function from($data) {
		return json_encode($data);
	}
}

class UserRequest {
	protected static $rules = [
		'name' => 'string',
		'email' => 'string',
	];

	public static function validate($data) {
		foreach ($data as $property => $type) {
			if (typeof($data[$property]) !== $type)
		 		throw new \Exception(message:"User Property {$property} Must Be Of Type {$type}");
		}
	}
}

class User {
	public $name;
	public $email;

	public function __construct($data){
		$this->name = $data['name'];
		$this->email = $data['email'];
	}
}

Route::get('/', function() {
	$data = request()->query();
	
	UserRequest::validate($data);
	
	$user = new User($data);

	return Json::from($data);
});