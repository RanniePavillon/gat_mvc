<?php

class User extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function login(){
		$this->model->login();
	}

	public function register(){
		$this->model->register();
	}
	
	public function logout(){
		$this->model->logout();
	}

	public function checkUser(){
		$this->model->checkUser();
	}
	public function admincheckUser(){
		$this->model->admincheckUser();
	}
	public function adminlogin(){
		$this->model->adminlogin();
	} 
	public function changeUserPass(){
		$this->model->changeUserPass();
	} 

}

?>