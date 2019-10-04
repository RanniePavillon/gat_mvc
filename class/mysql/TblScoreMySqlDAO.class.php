<?php
/**
 * Class that operate on table 'tbl_score'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
 */
class TblScoreMySqlDAO implements TblScoreDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return TblScoreMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM tbl_score WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM tbl_score';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM tbl_score ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param tblScore primary key
 	 */
	public function delete($id){
		$sql = 'DELETE FROM tbl_score WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblScoreMySql tblScore
 	 */
	public function insert($tblScore){
		$sql = 'INSERT INTO tbl_score (user_id, c_total, o_total, r_total, e_total, overall_total, date_created, date_modified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblScore->userId);
		$sqlQuery->setNumber($tblScore->cTotal);
		$sqlQuery->setNumber($tblScore->oTotal);
		$sqlQuery->setNumber($tblScore->rTotal);
		$sqlQuery->setNumber($tblScore->eTotal);
		$sqlQuery->setNumber($tblScore->overallTotal);
		$sqlQuery->set($tblScore->dateCreated);
		$sqlQuery->set($tblScore->dateModified);

		$id = $this->executeInsert($sqlQuery);	
		$tblScore->id = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblScoreMySql tblScore
 	 */
	public function update($tblScore){
		$sql = 'UPDATE tbl_score SET user_id = ?, c_total = ?, o_total = ?, r_total = ?, e_total = ?, overall_total = ?, date_created = ?, date_modified = ? WHERE id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($tblScore->userId);
		$sqlQuery->setNumber($tblScore->cTotal);
		$sqlQuery->setNumber($tblScore->oTotal);
		$sqlQuery->setNumber($tblScore->rTotal);
		$sqlQuery->setNumber($tblScore->eTotal);
		$sqlQuery->setNumber($tblScore->overallTotal);
		$sqlQuery->set($tblScore->dateCreated);
		$sqlQuery->set($tblScore->dateModified);

		$sqlQuery->setNumber($tblScore->id);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM tbl_score';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM tbl_score WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCTotal($value){
		$sql = 'SELECT * FROM tbl_score WHERE c_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOTotal($value){
		$sql = 'SELECT * FROM tbl_score WHERE o_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRTotal($value){
		$sql = 'SELECT * FROM tbl_score WHERE r_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByETotal($value){
		$sql = 'SELECT * FROM tbl_score WHERE e_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByOverallTotal($value){
		$sql = 'SELECT * FROM tbl_score WHERE overall_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateCreated($value){
		$sql = 'SELECT * FROM tbl_score WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDateModified($value){
		$sql = 'SELECT * FROM tbl_score WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM tbl_score WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCTotal($value){
		$sql = 'DELETE FROM tbl_score WHERE c_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOTotal($value){
		$sql = 'DELETE FROM tbl_score WHERE o_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRTotal($value){
		$sql = 'DELETE FROM tbl_score WHERE r_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByETotal($value){
		$sql = 'DELETE FROM tbl_score WHERE e_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByOverallTotal($value){
		$sql = 'DELETE FROM tbl_score WHERE overall_total = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateCreated($value){
		$sql = 'DELETE FROM tbl_score WHERE date_created = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDateModified($value){
		$sql = 'DELETE FROM tbl_score WHERE date_modified = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return TblScoreMySql 
	 */
	protected function readRow($row){
		$tblScore = new TblScore();
		
		$tblScore->id = $row['id'];
		$tblScore->userId = $row['user_id'];
		$tblScore->cTotal = $row['c_total'];
		$tblScore->oTotal = $row['o_total'];
		$tblScore->rTotal = $row['r_total'];
		$tblScore->eTotal = $row['e_total'];
		$tblScore->overallTotal = $row['overall_total'];
		$tblScore->dateCreated = $row['date_created'];
		$tblScore->dateModified = $row['date_modified'];

		return $tblScore;
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
	 * @return TblScoreMySql 
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