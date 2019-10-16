<?php

class Admin extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $check = Session::getSession('user')['username'];
		// echo $check;
		// return; 
		if(Session::getSession('user')['username']!='admin'){
			Session::destroy();
			header('location: '.URL.'admin');
		} else {
			$check = DAOFactory::getTblAdminDAO()->queryByUsername(Session::getSession('user')['username']);
			if(empty($check)){
				Session::destroy();
				header('location: '.URL);
			}
		}
		$this->view->getData = $this->model->getData();
		$this->view->render('views/admin/index.php');
	}
	public function reports()
	{	
		$this->view->score = $this->model->score();
		$this->view->render('views/admin/reports.php');
	}
	public function addUser(){
		$this->model->addUser();
	}
	public function returnReport(){
		// $this->view->report = $this->model->report();
		$this->view->getScore = $this->model->getScore();
		$this->view->getAnswers = $this->model->getAnswers();
		$this->view->render('views/admin/ajax/returnReport.php', true);
	}
}

?>