<?php

class User_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function checkEmail() {
		$email = $_POST['emailAddress'];
		$data = DAOFactory::getTblUserDAO()->queryByEmailAddress($email);
		if(!empty($data)){
			return $data[0];
		} else {
			return 'xExist';
		}
	}

	public function register(){
		$check = $this->checkEmail();
		if($check != 'xExist'){
			echo '3'; exit;
		}

		$insert = new TblUser;
		$insert = $this->setData($insert, $_POST);
		$insert->dateCreated = date('Y-m-d H:i:s');
		$id = DAOFactory::getTblUserDAO()->insert($insert);
		
		if($id>0){
			$this->login($insert);
		}
		else{
			echo 2;
		}
	}

	public function login($user_data = '0'){
		$check = $this->checkEmail();
		if($user_data=='0'){
			if($check=='xExist') {
				exit;
			} else {
				$user_data = $check; 
			}
		} else {
			$user_data = $check;
		}
		$user = Controller::objToArray($user_data);
		Session::setSession('user',$user);
		echo 1;
	}
	
	public function logout(){
		Session::destroy();
		header("location: ".URL);
	}

	public function checkUser(){
		$username = $_POST['username'];

		$data = DAOFactory::getTblUserDAO()->queryByUsername($username);
		if(empty($data)){
			$data_post = array();
			$data_post['username'] = $username;
			$getUser = $this->get(DOMAIN_DS.'user/getUserByUsername',$data_post);
			if($getUser==1){
				echo 1;
			} else {
			
				$insert = new TblUser;
				$insert->username = $getUser[0]->username;
				$insert->password = $getUser[0]->password;
				$insert->dateCreated = date('Y-m-d H:i:s');
				$insert->dateModified = "0000-00-00 00:00:00";
				DAOFactory::getTblUserDAO()->insert($insert);
				echo 0;
			}
		}
		else{
			echo 0;
		}
	}
	public function adminlogin(){
		$username = $_POST['username'];
		$password = $_POST['password'];


		$data = DAOFactory::getTblAdminDAO()->queryByUsername($username);


		foreach ($data as $each) {
			
			if($password==$each->password){
				$user = Controller::objToArray($each);
				Session::setSession('user',$user);
				echo 1;
			}
			else{
				echo 2;
			}
		}
	
	}
	public function admincheckUser(){
			$username = $_POST['username'];

			$data = DAOFactory::getTblAdminDAO()->queryByUsername($username);
			if(empty($data)){
				echo 1;
			}
			else{
				echo 0;
			}
		}
	public function changeUserPass(){
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$data = DAOFactory::getTblUserDAO()->queryByUsername($username);
		if(!empty($data)){
			$data[0]->password = $password;
			$data[0]->dateModified = date('Y-m-d H:i:s');
			DAOFactory::getTblUserDAO()->update($data[0]);
		}

	}

	function isJson($str)
	{
		json_decode($str);
		return (json_last_error() == JSON_ERROR_NONE);
	}	
	function get($url, $post_data)
	{

		$curl_connection = curl_init($url);
		curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);

		$post_data = http_build_query($post_data);
		curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_data);
		$result = curl_exec($curl_connection);  

		curl_close($curl_connection);

		return $result != "" ? ($this->isJson($result) ? json_decode($result) : $result) : false;
	}
}

?>