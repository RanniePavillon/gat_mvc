<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-11-10 07:23
 */
interface TblAnswerDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TblAnswer 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param tblAnswer primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TblAnswer tblAnswer
 	 */
	public function insert($tblAnswer);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TblAnswer tblAnswer
 	 */
	public function update($tblAnswer);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByAnswerTransactionId($value);

	public function queryByQuestionId($value);

	public function queryByAnswer($value);

	public function queryByDateCreated($value);

	public function queryByDateModified($value);


	public function deleteByAnswerTransactionId($value);

	public function deleteByQuestionId($value);

	public function deleteByAnswer($value);

	public function deleteByDateCreated($value);

	public function deleteByDateModified($value);


}
?>