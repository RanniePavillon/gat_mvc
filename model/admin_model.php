<?php

class Admin_model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function addUser(){

		$insert = new TblUser;
		$insert->username = $_POST['username'];
		$insert->password = $_POST['password'];
		$insert->dateCreated = date('Y-m-d H:i:s');
		$insert->dateModified = "0000-00-00 00:00:00";
		DAOFactory::getTblUserDAO()->insert($insert);
		echo 1;
	}
	public function getData(){
		return  DAOFactory::getTblUserDAO()->queryAll();
		// echo json_encode($data);
	}
	public function score(){
		return DAOFactory::getTblScoreDAO()->score();
	}
	public function report(){
		$userid = $_POST['userid'];
		return DAOFactory::getTblReportDAO()->report($userid);
	}
	public function getScore() {
		$userid = $_POST['userid'];
		return DAOFactory::getTblScoreDAO()->queryByUserId($userid);
	}
	public function getAnswers() {
		$userid = $_POST['userid'];
		// return DAOFactory::getTblAnswerDAO()->queryByUserId($userid);
		return DAOFactory::getTblQuestionDAO()->getQuestionAnswer($userid,'');
	}
}

?>