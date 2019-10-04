<?php

class Index extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	

	public function index()
	{
		// print_r($_SESSION); exit();
		/*if(Session::getSession('user')['username']=='admin'){
			Session::destroy();
			header('location: '.URL);
		} else {
			$check = DAOFactory::getTblUserDAO()->queryByUsername(Session::getSession('user')['username']);
			if(empty($check)){
				Session::destroy();
				header('location: '.URL);
			}
		}*/
		$this->view->getQuestions = $this->model->getQuestions();
		$this->view->getQuestionsAnswer = $this->model->getQuestionsAnswer();
		$this->view->getScore = $this->model->getScore();
		$this->view->getAnswers = $this->model->getAnswers();
		$this->view->render('views/index/landing.php');
	}
	
	function scoring()
	{
		$this->view->render('views/index/scoring.php');
	}
	function insertAnswers(){
		$this->model->insertAnswers();
	}
	function startExam(){
		$this->model->startExam();
	}
	function saveAnswer(){
		$this->model->saveAnswer();
	}
	
}

?>