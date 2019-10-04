<?php

class Index_Model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function getQuestionsAnswer() {
		
		return DAOFactory::getTblQuestionDAO()->getQuestionAnswer(Session::getSession('user')['id'],'');
	}
	public function getQuestions() {
		
		return DAOFactory::getTblQuestionDAO()->queryAll();
	}
	public function getScore() {
		
		return DAOFactory::getTblScoreDAO()->queryByUserId(Session::getSession('user')['id']);
	}
	public function getAnswers() {
		
		// return DAOFactory::getTblAnswerDAO()->queryByUserId(Session::getSession('user')['id']);
	}
	public function startExam(){
		$question = DAOFactory::getTblQuestionDAO()->queryAll();

		$checkTrans = DAOFactory::getTblAnswerTransactionDAO()->queryByUserId(Session::getSession('user')['id']);

		if(empty($checkTrans)){
			$insert = new TblAnswerTransaction;
			$insert->userId = Session::getSession('user')['id'];
			$insert->status = 1;
			$insert->dateCreated = date('Y-m-d H:i:s');
			$insert->dateModified = "0000-00-00";
			$id = DAOFactory::getTblAnswerTransactionDAO()->insert($insert);
			
			foreach ($question as $key => $each) {
            	$insertAnswer = new TblAnswer;
				$insertAnswer->answerTransactionId = $id;
				$insertAnswer->questionId = $each->id;
				$insertAnswer->answer = '';
				$insertAnswer->dateCreated = date('Y-m-d H:i:s');
				$insertAnswer->dateModified = "0000-00-00 00:00:00";
				DAOFactory::getTblAnswerDAO()->insert($insertAnswer);
			} 
			
		}
		$ext = "AND
					answer.answer = ''
				ORDER BY 
					question.id ASC";
		$getLast = DAOFactory::getTblQuestionDAO()->getQuestionAnswer(Session::getSession('user')['id'],$ext);
		// print_r( $getLast[0]['id']);
		// exit;
		$data = array();
		$data['username'] = Session::getSession('user')['username'];
		$data['lastQuestion'] = $getLast[0]['id'];
		Session::setSession('start',$data);
		header('location: '.URL);
	}
	public function saveAnswer(){
		
		$getTrans = DAOFactory::getTblAnswerTransactionDAO()->queryByUserId(Session::getSession('user')['id']);

		$update = DAOFactory::getTblAnswerDAO()->queryByQuestionIdAndTransId($_POST['question'],$getTrans[0]->id);
		$update[0]->answer = $_POST['answer'];
		$update[0]->dateModified = date('Y-m-d H:i:s');
		DAOFactory::getTblAnswerDAO()->update($update[0]);

		$ext = "AND
					answer.answer = ''
				ORDER BY 
					question.id ASC";
		$getLast = DAOFactory::getTblQuestionDAO()->getQuestionAnswer(Session::getSession('user')['id'],$ext);
		$data = array();
		$data['username'] = Session::getSession('user')['username'];
		$data['lastQuestion'] = $getLast[0]['id'];
		Session::setSession('start',$data);
	}
	public function insertAnswers(){
	
		$userid = Session::getSession('user')['id'];
		$answer = $_POST['answer'];
		$questionid = $_POST['questionid'];
		foreach ($answer as $key => $each) {

			$getTrans = DAOFactory::getTblAnswerTransactionDAO()->queryByUserId(Session::getSession('user')['id']);
			$update = DAOFactory::getTblAnswerDAO()->queryByQuestionIdAndTransId($questionid[$key],$getTrans[0]->id);
			$update[0]->answer = $each;
			$update[0]->dateModified = date('Y-m-d H:i:s');
			DAOFactory::getTblAnswerDAO()->update($update[0]);

		}


		$c = DAOFactory::getTblScoreDAO()->getCORE($userid,'(1,7,13,15,17)');
		$o = DAOFactory::getTblScoreDAO()->getCORE($userid,'(2,6,11,16,18)');
		$r = DAOFactory::getTblScoreDAO()->getCORE($userid,'(3,5,9,12,20)');
		$e = DAOFactory::getTblScoreDAO()->getCORE($userid,'(4,8,10,14,19)');

		$total = ($c[0]['sum'] + $o[0]['sum'] + $r[0]['sum'] + $e[0]['sum'])*2;

		$score = new TblScore;
		$score->cTotal =  $c[0]['sum'];
		$score->oTotal =  $o[0]['sum'];
		$score->rTotal =  $r[0]['sum'];
		$score->eTotal =  $e[0]['sum'];
		$score->overallTotal =  $total;
		$score->userId =  $userid;
		$score->dateCreated = date('Y-m-d H:i:s');
		$score->dateModified = "0000-00-00";
		DAOFactory::getTblScoreDAO()->insert($score);

		$getTrans = DAOFactory::getTblAnswerTransactionDAO()->queryByUserId(Session::getSession('user')['id']);
		$getTrans[0]->status = 2;
		DAOFactory::getTblAnswerTransactionDAO()->update($getTrans[0]);

		echo 1;

	}
	
}

?>