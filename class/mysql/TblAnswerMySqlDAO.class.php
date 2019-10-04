<?php
/**
 * Class that operate on table 'tbl_answer'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
 */
class TblAnswerMySqlDAO implements TblAnswerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblAnswerMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_answer WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_answer';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_answer ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblAnswer primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_answer WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAnswerMySql tblAnswer
 	 */
	public function insert($tblAnswer){
		$sql = 'INSERT INTO tbl_answer (answer_transaction_id, question_id, answer, date_created, date_modified) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAnswer->answerTransactionId);
		$sqlQuery->setNumber($tblAnswer->questionId);
		$sqlQuery->set($tblAnswer->answer);
		$sqlQuery->set($tblAnswer->dateCreated);
		$sqlQuery->set($tblAnswer->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblAnswer->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAnswerMySql tblAnswer
 	 */
	public function update($tblAnswer){
		$sql = 'UPDATE tbl_answer SET answer_transaction_id = ?, question_id = ?, answer = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblAnswer->answerTransactionId);
		$sqlQuery->setNumber($tblAnswer->questionId);
		$sqlQuery->set($tblAnswer->answer);
		$sqlQuery->set($tblAnswer->dateCreated);
		$sqlQuery->set($tblAnswer->dateModified);

		$sqlQuery->setNumber($tblAnswer->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_answer';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByAnswerTransactionId($value){
		$sql = 'SELECT * FROM tbl_answer WHERE answer_transaction_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByQuestionId($value){
		$sql = 'SELECT * FROM tbl_answer WHERE question_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAnswer($value){
		$sql = 'SELECT * FROM tbl_answer WHERE answer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_answer WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_answer WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByAnswerTransactionId($value){
		$sql = 'DELETE FROM tbl_answer WHERE answer_transaction_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByQuestionId($value){
		$sql = 'DELETE FROM tbl_answer WHERE question_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAnswer($value){
		$sql = 'DELETE FROM tbl_answer WHERE answer = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_answer WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_answer WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblAnswerMySql 
	 */
	protected function readRow($row){
		$tblAnswer = new TblAnswer();
		
		$tblAnswer->id = $row['id'];
		$tblAnswer->answerTransactionId = $row['answer_transaction_id'];
		$tblAnswer->questionId = $row['question_id'];
		$tblAnswer->answer = $row['answer'];
		$tblAnswer->dateCreated = $row['date_created'];
		$tblAnswer->dateModified = $row['date_modified'];

		return $tblAnswer;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return TblAnswerMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>