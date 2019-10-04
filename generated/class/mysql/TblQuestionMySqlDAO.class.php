<?php
/**
 * Class that operate on table 'tbl_question'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:15
 */
class TblQuestionMySqlDAO implements TblQuestionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblQuestionMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_question WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_question';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_question ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblQuestion primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_question WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblQuestionMySql tblQuestion
 	 */
	public function insert($tblQuestion){
		$sql = 'INSERT INTO tbl_question (question, lower_rate, higher_rate, date_created, date_modified) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblQuestion->question);
		$sqlQuery->set($tblQuestion->lowerRate);
		$sqlQuery->set($tblQuestion->higherRate);
		$sqlQuery->set($tblQuestion->dateCreated);
		$sqlQuery->set($tblQuestion->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblQuestion->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblQuestionMySql tblQuestion
 	 */
	public function update($tblQuestion){
		$sql = 'UPDATE tbl_question SET question = ?, lower_rate = ?, higher_rate = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($tblQuestion->question);
		$sqlQuery->set($tblQuestion->lowerRate);
		$sqlQuery->set($tblQuestion->higherRate);
		$sqlQuery->set($tblQuestion->dateCreated);
		$sqlQuery->set($tblQuestion->dateModified);

		$sqlQuery->setNumber($tblQuestion->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_question';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByQuestion($value){
		$sql = 'SELECT * FROM tbl_question WHERE question = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLowerRate($value){
		$sql = 'SELECT * FROM tbl_question WHERE lower_rate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByHigherRate($value){
		$sql = 'SELECT * FROM tbl_question WHERE higher_rate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_question WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_question WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByQuestion($value){
		$sql = 'DELETE FROM tbl_question WHERE question = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLowerRate($value){
		$sql = 'DELETE FROM tbl_question WHERE lower_rate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByHigherRate($value){
		$sql = 'DELETE FROM tbl_question WHERE higher_rate = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_question WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_question WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblQuestionMySql 
	 */
	protected function readRow($row){
		$tblQuestion = new TblQuestion();
		
		$tblQuestion->id = $row['id'];
		$tblQuestion->question = $row['question'];
		$tblQuestion->lowerRate = $row['lower_rate'];
		$tblQuestion->higherRate = $row['higher_rate'];
		$tblQuestion->dateCreated = $row['date_created'];
		$tblQuestion->dateModified = $row['date_modified'];

		return $tblQuestion;
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
	 * @return TblQuestionMySql 
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