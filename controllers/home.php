<?php

class Home extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if(Session::getSession('user')['username']=='admin'){
			Session::destroy();
			header('location: '.URL);
		}
		$this->view->render('views/home/index.php',true);
	}
	
	public function login()
	{
		if(Session::getSession('user')['username']=='admin'){
			Session::destroy();
			header('location: '.URL);
		}
		$this->view->render('views/home/login.php',true);
	}

	public function change()
	{
		$this->view->render('views/home/change.php',true);
	}
	public function admin()
	{
		$this->view->render('views/home/admin.php', true);
	}
}

?>